<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreventLoggedInUserAccess
{
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah cookie 'user_email' ada atau pengguna sudah terautentikasi
        if ($request->hasCookie('user_email') || Auth::check()) {
            // Redirect ke halaman sebelumnya
            return redirect()->back();
        }

        return $next($request);
    }
}
