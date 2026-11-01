<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Models\MyUrl;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UrlController extends Controller
{
    public function create()
    {
        // Menampilkan halaman form input URL
        return view('urls.create');
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'long_url' => 'required|url|unique:urls,long_url', // Validasi URL panjang dan unik
            'status' => 'required|in:draft,online', // Validasi status sebagai draft atau online
        ]);

        // Generate URL pendek dan pastikan unik
        do {
            $shortUrl = $this->generateShortUrl();
        } while (Url::where('short_url', $shortUrl)->exists());

        // Simpan data ke database dengan penanganan kesalahan
        try {
            // Simpan URL di tabel 'urls'
            $url = Url::create([
                'long_url' => $request->long_url,
                'short_url' => url('/') . '/' . $shortUrl,
                'status' => $request->status, // Simpan status yang dipilih
            ]);

            // Generate QR Code untuk URL
            $qrCode = QrCode::size(200)->generate($url->short_url);
            $url->qr_code = $qrCode;
            $url->save();

            // Simpan data di tabel 'myurl'
            MyUrl::create([
                'url_id' => $url->id,
                'status' => $url->status, // Status sesuai yang dipilih
                'visited_at' => now(),
            ]);

            return redirect()->route('urls.create')->with([
                'success' => 'Selamat !! URL Anda berhasil dibuat!',
                'short_url' => $url->short_url,
                'qr_code' => $url->qr_code,
            ]);
        } catch (\Exception $e) {
            return redirect()->route('urls.create')->withErrors([
                'error' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage(),
            ]);
        }
    }

    private function generateShortUrl($length = 6)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $shortUrl = '';
        for ($i = 0; $i < $length; $i++) {
            $shortUrl .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $shortUrl;
    }

    public function redirectToLongUrl($short_url)
    {
        // Cari URL berdasarkan short_url
        $url = Url::where('short_url', url('/') . '/' . $short_url)->first();

        // Jika URL tidak ditemukan, tampilkan error 404
        if (!$url) {
            return abort(404, 'URL tidak ditemukan');
        }

        // Periksa status URL
        if ($url->status === 'draft') {
            return response()->view('urls.unavailable', [
                'message' => 'URL ini belum siap diakses. Silakan cek kembali nanti.',
            ]);
        }

        // Redirect ke URL panjang jika statusnya online
        return redirect()->away($url->long_url);
    }
}
