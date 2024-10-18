<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'username' => 'required|string|max:20|unique:users',
            'email' => 'required|string|email|max:50|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect to login page after successful registration
        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'identifier' => 'required|string',
            'password' => 'required|string',
        ]);

        // Mencari pengguna berdasarkan email atau username
        $user = User::where('email', $request->identifier)
                    ->orWhere('username', $request->identifier)
                    ->first();

        // Cek apakah pengguna ditemukan dan password cocok
        if ($user && Hash::check($request->password, $user->password)) {
            // Autentikasi pengguna
            Auth::login($user);

            // Set cookie dengan email pengguna, valid 10 menit
            $cookie = cookie('user_email', $user->email, 10);

            // Cek apakah pengguna adalah admin
            if ($user->isAdmin()) { // Pastikan Anda memiliki metode isAdmin() di model User
                return redirect()->route('dashboard')->withCookie($cookie);
            }

            return redirect()->route('home')->withCookie($cookie);
        }

        // Jika pengguna tidak ditemukan atau password salah, hapus cookie 'user_email'
        return redirect()->route('login')->withCookie(cookie()->forget('user_email'))->withErrors([
            'identifier' => 'The provided credentials are incorrect.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->withCookie(cookie()->forget('user_email')); // Hapus cookie pada logout
    }


}