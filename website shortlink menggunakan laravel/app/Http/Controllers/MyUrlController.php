<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;

class MyUrlController extends Controller
{
    /**
     * Menampilkan daftar URL berdasarkan status (Draft & Online).
     */
    public function index()
    {
        // Ambil URL dengan status draft
        $draftUrls = Url::where('status', 'draft')->orderBy('created_at', 'desc')->paginate(10);

        // Ambil URL dengan status online
        $onlineUrls = Url::where('status', 'online')->orderBy('created_at', 'desc')->paginate(10);

        return view('myurl.index', compact('draftUrls', 'onlineUrls'));
    }

    /**
     * Hapus URL.
     */
    public function destroy($id)
    {
        $url = Url::findOrFail($id);
        $url->delete();

        return redirect()->route('myurl.index')->with('success', 'URL berhasil dihapus!');
    }
}
