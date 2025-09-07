<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            if (!$user->is_active) {
                Auth::logout();
                throw ValidationException::withMessages([
                    'email' => ['Akun Anda telah dinonaktifkan.'],
                ]);
            }

            // Redirect berdasarkan role
            if ($user->role === 'admin_kecamatan') {
                return redirect()->intended(route('admin.dashboard'));
            } elseif ($user->role === 'admin_desa') {
                return redirect()->intended(route('admin-desa.dashboard'));
            }

            return redirect()->intended('/dashboard');
        }

        throw ValidationException::withMessages([
            'email' => ['Email atau password tidak valid.'],
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah berhasil logout.');
    }
}