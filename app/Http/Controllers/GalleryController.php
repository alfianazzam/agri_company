<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\CategoryGallery;

class GalleryController extends Controller
{
    // Menampilkan halaman utama admin
    public function index()
    {
        $galleries = Gallery::with('category')->get(); // Ambil data galeri dengan kategori
        $categories = CategoryGallery::all(); // Ambil semua kategori
        return view('page.landing.pages.gallery.index', compact('galleries', 'categories'));
    }


    // Menampilkan halaman admin gallery
    public function admin()
    {
        $galleries = Gallery::with('category', 'user')->get();
        $categories = CategoryGallery::all();
        return view('page.admin.services.gallery.index', compact('galleries', 'categories'));
    }
    
    public function show()
    {
        $galleries = Gallery::with('category')->get(); // Ambil data galeri dengan kategori
        $categories = CategoryGallery::all(); // Ambil semua kategori
        return view('page.landing.pages.gallery.index', [
            'categories' => $categories,
            'galleries' => $galleries, 
            'showHeader' => false, 
            'showFooter' => false
        ]);
    }

    // Menyimpan atau mengupdate gallery
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'category_id' => 'required',
            'img_url' => 'nullable|image',
        ]);

        $gallery = $request->id ? Gallery::findOrFail($request->id) : new Gallery;

        $gallery->title = $request->input('title');
        $gallery->description = $request->input('description');
        $gallery->category_id = $request->input('category_id');

        if ($request->hasFile('img_url')) {
            if ($gallery->img_url) {
                Storage::delete($gallery->img_url); // Hapus gambar lama jika ada
            }
            $gallery->img_url = $request->file('img_url')->store('images/galleries', 'public'); // Simpan gambar baru
        }

        $gallery->user_id = auth()->user()->id; // Set user ID
        $gallery->save();

        return redirect()->route('gallery.admin')->with('success', 'Gallery berhasil disimpan.');
    }

    // Menghapus gallery
    public function delete($id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->img_url) {
            Storage::delete($gallery->img_url); // Hapus gambar
        }

        $gallery->delete();

        return redirect()->route('gallery.admin')->with('success', 'Gallery berhasil dihapus.');
    }
}
