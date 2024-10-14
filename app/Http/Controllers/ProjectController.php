<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\CategoryGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    // Display a listing of the projects
    public function index()
    {
        $projects = Project::with('user', 'category')->get();
        $categories = CategoryGallery::all();

        return view('page.admin.services.projects.index', compact('projects', 'categories'));
    }

    public function show($id)
    {
        // Ambil project
        $project = Project::findOrFail($id);
        
        // Decode JSON images menjadi array
        $project->images = json_decode($project->images, true);

        // Ambil related projects
        $relatedProjects = Project::where('id', '!=', $id)->take(3)->get();

        return view('page.landing.pages.project.index', [
            'project' => $project,
            'relatedProjects' => $relatedProjects,
            'showHeader' => false, 
            'showFooter' => false
        ]);
    }

    public function project($id)
    {
        // Ambil project
        $project = Project::findOrFail($id);
        
        // Decode JSON images menjadi array
        $project->images = json_decode($project->images, true);

        // Ambil related projects
        $relatedProjects = Project::where('id', '!=', $id)->take(3)->get();

        return view('page.landing.pages.project.index', [
            'project' => $project,
            'relatedProjects' => $relatedProjects,
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'jumbotron_title' => 'required|string|max:255',
            'jumbotron_subtitle' => 'nullable|string|max:255',
            'jumbotron_image' => 'nullable|image',
            'text_content' => 'required|string',
            'client' => 'nullable|string',
            'date' => 'nullable|date',
            'location' => 'nullable|string',
            'website' => 'nullable|url',
            'images' => 'nullable|array',
            'images.*' => 'image', // Validate each image in the array
            'category_id' => 'nullable|exists:category_gallery,id',
        ]);

        // Check if the project exists for update, otherwise create a new one
        $project = $request->id ? Project::findOrFail($request->id) : new Project;

        // Assign data to the project
        $project->jumbotron_title = $request->input('jumbotron_title');
        $project->jumbotron_subtitle = $request->input('jumbotron_subtitle');
        $project->text_content = $request->input('text_content');
        $project->client = $request->input('client');
        $project->date = $request->input('date');
        $project->location = $request->input('location');
        $project->website = $request->input('website');
        $project->category_id = $request->input('category_id');

        // Process the jumbotron image if uploaded
        if ($request->hasFile('jumbotron_image')) {
            if ($project->jumbotron_image) {
                Storage::delete($project->jumbotron_image); // Delete the old image
            }
            // Update the storage path for the jumbotron image
            $project->jumbotron_image = $request->file('jumbotron_image')->store('images/projects/jumbotron', 'public');
        }

        // Process multiple images if uploaded
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('images/projects', 'public');
            }
            $project->images = json_encode($images); // Store as JSON
        }

        $project->user_id = auth()->user()->id; // Set the user ID
        $project->save();

        return redirect()->route('project.admin')->with('success', 'Project berhasil disimpan.');
    }


    // Update project based on ID
    public function update(Request $request, $id)
    {
        // Merge the project ID into the request
        $request->merge(['id' => $id]);

        // Call the store method to handle both creation and update
        return $this->store($request);
    }


    // Delete a specific project
    public function delete($id)
    {
        $project = Project::findOrFail($id);

        // Delete jumbotron image if it exists
        if ($project->jumbotron_image) {
            Storage::delete($project->jumbotron_image);
        }

        // Delete project images if they exist
        if ($project->images) {
            $images = json_decode($project->images);
            foreach ($images as $image) {
                Storage::delete($image);
            }
        }

        $project->delete(); // Delete the project

        return redirect()->route('project.admin')->with('success', 'Project berhasil dihapus.');
    }
}
