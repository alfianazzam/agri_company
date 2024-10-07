<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah cookie 'user_email' ada
        if ($request->hasCookie('user_email')) {
            // Ambil email dari cookie
            $email = $request->cookie('user_email');
            // Cari pengguna berdasarkan email
            $user = User::where('email', $email)->first();

            if ($user) {
                // Jika pengguna ditemukan, autentikasi pengguna
                Auth::login($user);
            } else {
                // Jika pengguna tidak ditemukan, hapus cookie
                return redirect()->route('login')->withCookie(cookie()->forget('user_email'));
            }
        }

        // Jika pengguna belum login, arahkan ke halaman login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to login first.')->withCookie(cookie()->forget('user_email')); // Remove the cookie
        }

        // Jika pengguna adalah admin, izinkan melanjutkan permintaan
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'You do not have admin access.');
        }

        return $next($request);
    }
}
