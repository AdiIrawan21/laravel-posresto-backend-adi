<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Memeriksa apakah pengguna memiliki peran 'admin'
        if ($request->user() && $request->user()->hasRole('admin')) {
            // Jika iya, lanjutkan permintaan
            return $next($request);
        }

        // Jika tidak, arahkan pengguna ke halaman lain atau kembalikan respons yang sesuai
        return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
