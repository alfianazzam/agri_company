<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Gallery;
use App\Models\Poster;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        // Mencari di berbagai model
        $projects = Project::where('jumbotron_title', 'LIKE', "%{$query}%")->get();
        $galleries = Gallery::where('title', 'LIKE', "%{$query}%")->get();
        $posters = Poster::where('title', 'LIKE', "%{$query}%")->get();

        // Mengembalikan view dengan hasil pencarian
        return view('search.results', compact('projects', 'galleries', 'posters', 'query'));
    }
}