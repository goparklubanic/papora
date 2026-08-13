<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // return $next($request);
        // Cek apakah user login dan memiliki role admin
        if (Auth::check() && Auth::user()->role === 'walidata') {
            return $next($request);
        }

        // Jika bukan admin, redirect atau return error
        abort(403, 'Akses ditolak. Hanya untuk administrator.');
        // atau
        // return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
