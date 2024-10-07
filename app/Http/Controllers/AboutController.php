<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    // Menampilkan halaman utama admin
    public function index()
    {
        $about = AboutUs::first(); // Ambil satu data About Us
        return view('page.admin.pages.about.index', compact('about'));
    }

    public function show()
    {
        $about = AboutUs::first(); // Ambil satu data About Us
        return view('components.about.live', [
            'showHeader' => false,
            'showFooter' => false,
            'about' => $about,
        ]);
    }

    // Store or update About Us
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'nullable',
            'image_url' => 'image|nullable',
            'text' => 'required',
        ]);

        $aboutUs = AboutUs::firstOrNew(); // Create or update the existing entry

        $aboutUs->title = $request->input('title');
        $aboutUs->subtitle = $request->input('subtitle');

        // Replace newlines with <br> in the 'text' input
        $aboutUs->text = str_replace("\n", "<br>", $request->input('text'));

        // Handle the image upload if a new file is provided
        if ($request->hasFile('image_url')) {
            if ($aboutUs->image_url) {
                \Storage::delete($aboutUs->image_url); // Delete the old image
            }
            $aboutUs->image_url = $request->file('image_url')->store('images/about_us', 'public');
        }

        $aboutUs->save();

        return redirect()->route('about')->with('success', 'About Us updated successfully.');
    }

    // Delete About Us
    public function delete($id)
    {
        $aboutUs = AboutUs::findOrFail($id);

        if ($aboutUs->image_url) {
            \Storage::delete($aboutUs->image_url); // Delete the old image
        }

        $aboutUs->delete();

        return redirect()->route('about')->with('success', 'About Us deleted successfully.');
    }
}
