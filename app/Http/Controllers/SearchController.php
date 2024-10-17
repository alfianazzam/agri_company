<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Gallery;
use App\Models\Poster;
use App\Models\User;
use App\Models\Testimonial;
use App\Models\TeamMember;
use App\Models\Jumbotron;
use App\Models\Company;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil input query dari permintaan
        $query = $request->input('query');

        // Mencari di berbagai model
        $projects = Project::where('jumbotron_title', 'LIKE', "%{$query}%")
            ->orWhere('jumbotron_subtitle', 'LIKE', "%{$query}%")
            ->orWhere('text_content', 'LIKE', "%{$query}%")
            ->get();

        $galleries = Gallery::where('title', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();

        $posters = Poster::where('title', 'LIKE', "%{$query}%")
            ->orWhere('content', 'LIKE', "%{$query}%")
            ->get();

        $users = User::where('name', 'LIKE', "%{$query}%")
            ->orWhere('username', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->get();

        $testimonials = Testimonial::where('quote', 'LIKE', "%{$query}%")
            ->orWhere('writer', 'LIKE', "%{$query}%")
            ->get();

        $teamMembers = TeamMember::where('name', 'LIKE', "%{$query}%")
            ->orWhere('role', 'LIKE', "%{$query}%")
            ->get();

        $jumbotrons = Jumbotron::where('title', 'LIKE', "%{$query}%")
            ->orWhere('subtitle', 'LIKE', "%{$query}%")
            ->get();

        $companies = Company::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();

        // Mengembalikan view dengan hasil pencarian
        return view('search.results', compact(
            'projects', 
            'galleries', 
            'posters', 
            'users', 
            'testimonials', 
            'teamMembers', 
            'jumbotrons', 
            'companies', 
            'query'
        ));
    }
}
