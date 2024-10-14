<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jumbotron;
use App\Models\AboutUs;
use App\Models\Poster;
use App\Models\Agenda;
use App\Models\Project;

class LandingController extends Controller
{
    public function index()
    {
        $jumbos = Jumbotron::all();
        $about = AboutUs::first();
        $posters = Poster::with('user')->paginate(8); 
        return view('page.landing.index', compact('jumbos', 'about', 'posters') );
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

    public function agenda()
    {
        $agendas = Agenda::orderBy('date', 'desc')->get();
        return view('page.landing.pages.agenda.index', compact('agendas'));
    }

    public function project()
    {
        return view('page.landing.pages.project.show');
    }

}
