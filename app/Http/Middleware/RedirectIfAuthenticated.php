<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();
                
                if ($user->role === 'admin_kecamatan') {
                    return redirect()->route('admin.dashboard');
                } elseif ($user->role === 'admin_desa') {
                    return redirect()->route('admin-desa.dashboard');
                }
                
                return redirect('/dashboard');
            }
        }

        return $next($request);
    }
}