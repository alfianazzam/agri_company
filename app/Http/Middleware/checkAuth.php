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
        // Jika pengguna sudah login, tidak perlu menghapus cookie
        if (Auth::check()) {
            return $next($request);
        }

        // Jika cookie 'user_email' ada, autentikasi pengguna
        if ($request->hasCookie('user_email')) {
            $email = $request->cookie('user_email');
            $user = User::where('email', $email)->first();

            if ($user) {
                // Autentikasi pengguna
                Auth::login($user);
            } else {
                // Jika pengguna tidak ditemukan, hapus cookie
                return redirect()->route('login')->withCookie(cookie()->forget('user_email'));
            }
        }

        // Jika pengguna belum login dan cookie tidak valid, arahkan ke halaman login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to login first.');
        }

        return $next($request);
    }
}
