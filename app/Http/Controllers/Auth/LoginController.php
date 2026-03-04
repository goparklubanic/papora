<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Tampilkan form login (jika belum ada)
    public function showLoginForm()
    {
        return view('dashboard'); // Sesuaikan dengan nama view Anda
    }

    // Proses login
    public function login(Request $request)
    {
        // 1. Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Coba authenticate
        if (Auth::attempt($credentials)) {
            // 3. Regenerasi session untuk keamanan
            $request->session()->regenerate();

            // 4. Redirect ke index (sesuai permintaan)
            return redirect()->intended('/');
        }

        // 5. Jika gagal, kembali ke login dengan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}