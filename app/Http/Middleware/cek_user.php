<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class cek_user
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Harap login terlebih dahulu.');
        }

        $userEmail = Auth::user()->email;

        // Cek apakah email user ada di tabel siswa
        if (!Siswa::where('email', $userEmail)->exists()) {
            Auth::logout(); // Logout user jika email tidak cocok
            return redirect('/login')->with('error', 'Email tidak terdaftar sebagai siswa.');
        }

        return $next($request);
    }
}
