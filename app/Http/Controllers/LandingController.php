<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jumbotron; // Make sure to include your Jumbotron model
use App\Models\AboutUs; // Make sure to include your Jumbotron model
use App\Models\Poster; // Make sure to include your Jumbotron model

class LandingController extends Controller
{
    public function index()
    {
        $jumbos = Jumbotron::all();
        $about = AboutUs::first();
        return view('page.landing.index', compact('jumbos', 'about'));
    }

    public function login()
    {
        return view('page.auth.login');
    }

    public function register()
    {
        return view('page.auth.register');
    }

    public function poster()
    {
        // Menggunakan pagination dengan 6 item per halaman
        $posters = Poster::with('user')->paginate(8); 
        // Mengirim variabel 'posters' ke view
        return view('page.landing.pages.posters.index', compact('posters')); 
    }


}
