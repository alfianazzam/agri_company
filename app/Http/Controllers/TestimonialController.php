<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('page.admin.pages.testimonial.index', compact('testimonials'));
    }

    public function show()
    {
        $testimonials = Testimonial::all();
        return view('page.admin.pages.testimonial.show', [
            'showHeader' => false,
            'showFooter' => false,
            'testimonials' => $testimonials,
        ]);
    }

    // Menyimpan Testimonial baru
    public function store(Request $request)
    {
        $request->validate([
            'jumbotron_image' => 'required|image', // Pastikan tipe validasinya adalah 'image'
            'quote' => 'required',
            'writer' => 'required',
        ]);

        // Mendapatkan ekstensi file
        $extension = $request->file('jumbotron_image')->getClientOriginalExtension();
        // Membuat nama unik untuk file
        $imageName = Str::random(10) . '.' . $extension; // atau uniqid() . '.' . $extension;

        // Menyimpan gambar ke dalam folder public/img/testimonial/
        $image_urlPath = $request->file('jumbotron_image')->storeAs('images/testimonial', $imageName, 'public');

        Testimonial::create([
            'jumbotron_image' => $image_urlPath, // Menyimpan path yang sesuai
            'quote' => $request->input('quote'),
            'writer' => $request->input('writer'),
        ]);

        return redirect()->route('testimonial.admin')->with('success', 'Testimonial berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $request->validate([
            'jumbotron_image' => 'image|nullable', // Gambar baru bersifat opsional
            'quote' => 'required',
            'writer' => 'required',
        ]);

        // Update fields
        $testimonial->quote = $request->input('quote');
        $testimonial->writer = $request->input('writer');

        // Hanya simpan gambar jika diupload
        if ($request->hasFile('jumbotron_image')) {
            // Hapus gambar lama jika ada
            if ($testimonial->jumbotron_image) {
                \Storage::delete('public/' . $testimonial->jumbotron_image); // Hapus gambar lama
            }

            // Menyimpan gambar baru
            $image_urlPath = $request->file('jumbotron_image')->store('images/testimonial', 'public');
            $testimonial->jumbotron_image = $image_urlPath; // Update path gambar
        }

        $testimonial->save();

        return redirect()->route('testimonial.admin')->with('success', 'Testimonial berhasil diperbarui.');
    }

    public function delete($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        // Hapus file gambar dari storage
        if (file_exists(public_path('storage/' . $testimonial->jumbotron_image))) {
            unlink(public_path('storage/' . $testimonial->jumbotron_image));
        }

        // Hapus record dari database
        $testimonial->delete();

        return redirect()->route('testimonial.admin')->with('success', 'Testimonial berhasil dihapus.');
    }
}