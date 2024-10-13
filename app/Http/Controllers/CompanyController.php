<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        // Fetch the single company instance or create a new one if it doesn't exist
        $company = Company::first() ?? new Company();
        return view('page.admin.config.index', compact('company'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'logo_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'whatsapp' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'twitter' => 'nullable|url',
        ]);

        // Get the single company instance
        $company = Company::first();

        // Prepare the data for update
        $data = $request->only(['name', 'address', 'phone', 'email', 'description', 'facebook', 'instagram', 'whatsapp', 'linkedin', 'twitter']);

        // Handle logo upload
        if ($request->hasFile('logo_url')) {
            // Delete the old logo if exists
            if ($company->logo_url) {
                Storage::disk('public')->delete($company->logo_url);
            }
            // Store the new logo
            $data['logo_url'] = $request->file('logo_url')->store('logos', 'public');
        }

        // Update the company instance
        $company->update($data); // Ensure this updates the social media fields

        return redirect()->route('company.index')->with('success', 'Company information updated successfully.');
    }


}
