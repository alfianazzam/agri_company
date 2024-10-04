<?php

namespace App\Http\Controllers;

// use App\Models\Poster;

class AdminController extends Controller
{
    public function index()
    {
        return view('page.admin.index');
    }

    public function landing()
    {
        return view('page.admin.pages.landing.index');
    }
}
