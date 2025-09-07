<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminDesaMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role !== 'admin_desa') {
            abort(403, 'Akses ditolak. Anda tidak memiliki hak akses sebagai Admin Desa.');
        }

        if (!Auth::user()->is_active) {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Akun Anda telah dinonaktifkan.');
        }

        if (!Auth::user()->desa_id) {
            abort(403, 'Akses ditolak. Anda belum terdaftar di desa manapun.');
        }

        return $next($request);
    }
}