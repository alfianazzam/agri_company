<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PosterController extends Controller
{
    public function index()
    {
        return view('page.landing.pages.posters.index');
    }

    public function admin()
    {
        return view('page.admin.services.posters.index');
    }
}
