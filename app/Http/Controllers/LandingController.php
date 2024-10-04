<?php

namespace App\Http\Controllers;

// use App\Models\Poster;

class LandingController extends Controller
{
    public function index()
    {
        return view('page.landing.index');
    }
    public function login()
    {
        return view('page.auth.login');
    }
    public function register()
    {
        return view('page.auth.register');
    }
    public function notfound()
    {
        return view('page.404.index');
    }
}
