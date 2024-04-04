<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  ...$levels
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ...$levels): Response
    {
        // Memastikan pengguna telah login sebelum melakukan pengecekan level
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        if (in_array($request->user()->level, $levels)) {
            return $next($request);
        }

        return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
