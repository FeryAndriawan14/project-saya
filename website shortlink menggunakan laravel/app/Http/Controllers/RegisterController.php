<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('register'); // Menampilkan form pendaftaran
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255', // Validasi untuk 'name'
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Buat user baru
        $user = new User();
        $user->name = $validated['name']; // Mengisi 'name'
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']); // Hash password
        $user->email_verified_at = null; // Default null jika belum diverifikasi
        $user->save();

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Pendaftaran berhasil, silakan login.');
    }
}
