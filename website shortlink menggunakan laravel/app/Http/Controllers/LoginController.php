<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function index()
    {
        return view('login'); // Pastikan ada file view 'login.blade.php'
    }

    // Menangani proses autentikasi
    public function authenticate(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Autentikasi pengguna
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors([
                'message' => 'Autentikasi gagal. Periksa email atau password Anda.',
            ])->withInput();
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login'); // Redirect ke halaman login
    }
}
