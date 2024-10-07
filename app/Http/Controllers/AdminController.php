<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jumbotron;
use App\Models\AboutUs;

class AdminController extends Controller
{
    // Menampilkan halaman utama admin
    public function index()
    {
        return view('page.admin.index');
    }
}
