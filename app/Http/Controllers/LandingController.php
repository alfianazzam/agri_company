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
        return view('page.form.login');
    }
    public function register()
    {
        return view('page.form.register');
    }
}
