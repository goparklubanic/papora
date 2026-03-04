<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // return $next($request);
        // Cek apakah user sudah login
        if (!auth()->check()) {
            return redirect('/');
        }

        // Cek apakah role user sesuai dengan yang diminta middleware
        // Contoh: middleware('role:admin') maka $role = 'admin'
        if (auth()->user()->role !== $role) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
