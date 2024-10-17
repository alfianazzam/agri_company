<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::all();
        return view('page.admin.pages.feature.index', compact('features')); 
    }

    public function icons()
    {
        return view('page.admin.pages.feature.icons', [
        'showHeader' => false, 
        'showFooter' => false]);
    }

    public function show()
    {
        $feature = Feature::all();
        return view('page.admin.pages.feature.show', [
        'feature' => $feature, 
        'showHeader' => false, 
        'showFooter' => false]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon_class' => 'required|string|max:255',
            'icon_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required',
        ]);

        Feature::create($request->all());

        return redirect()->route('feature.admin')->with('success', 'Feature added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'icon_class' => 'required|string|max:255',
            'icon_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required',
        ]);

        $feature = Feature::findOrFail($id);
        $feature->update($request->all());

        return redirect()->route('feature.admin')->with('success', 'Feature updated successfully.');
    }

    public function delete($id)
    {
        $feature = Feature::findOrFail($id);
        $feature->delete();

        return redirect()->route('feature.admin')->with('success', 'Feature deleted successfully.');
    }
}
