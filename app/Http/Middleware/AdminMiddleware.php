<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <--- PASTIKAN ADA BARIS INI
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Menggunakan Facade Auth lebih aman dari error 'undefined method'
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Akses ditolak! Silakan login.');
        }

        return $next($request);
    }
}