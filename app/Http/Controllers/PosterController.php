<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Poster;
use App\Models\CategoryPoster; // Mengimpor model Category

class PosterController extends Controller
{
    public function index($id)
    {
        // Ambil poster berdasarkan ID dengan relasi user
        $poster = Poster::with('user', 'category')->findOrFail($id); // Menggunakan findOrFail untuk mendapatkan poster atau throw 404 jika tidak ada
        $categories = CategoryPoster::all(); // Ambil semua kategori
        return view('page.landing.pages.posters.show', compact('poster', 'categories')); // Kirimkan poster yang dipilih ke view
    }
    
    public function admin()
    {
        $posters = Poster::with('user')->get(); // Ambil semua poster dengan relasi user
        $categories = CategoryPoster::all(); // Ambil semua kategori
        return view('page.admin.services.posters.index', compact('posters', 'categories')); // Kirimkan variabel posters dan categories ke view
    }


    // Menampilkan poster untuk live preview
    public function show($id)
    {
        $poster = Poster::with('user', 'category')->findOrFail($id); // Mengambil kategori juga
        $categories = CategoryPoster::all(); // Ambil semua kategori
        return view('page.landing.pages.posters.show', [
            'categories' => $categories,
            'poster' => $poster, 
            'showHeader' => false, 
            'showFooter' => false
        ]);
    }

    // Store untuk menambah atau memperbarui poster
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id', // Validasi kategori
            'image_url' => 'nullable|image',
        ]);

        // Jika ID ada, maka update, jika tidak maka tambah baru
        $poster = $request->id ? Poster::findOrFail($request->id) : new Poster;

        // Assign data input ke model
        $poster->title = $request->input('title');
        $poster->content = nl2br($request->input('content')); // Mengubah newlines ke <br>
        $poster->category_id = $request->input('category_id'); // Set category ID

        // Proses gambar jika ada file yang di-upload
        if ($request->hasFile('image_url')) {
            if ($poster->img_url) {
                Storage::delete($poster->img_url); // Hapus gambar lama jika ada
            }
            $poster->img_url = $request->file('image_url')->store('images/posters', 'public'); // Simpan gambar baru
        }

        $poster->user_id = auth()->user()->id; // Set user ID
        $poster->save();

        return redirect()->route('poster.admin')->with('success', 'Poster berhasil disimpan.');
    }


    // Update poster berdasarkan ID (gunakan fungsi store untuk menyederhanakan)
    public function update(Request $request, $id)
    {
        return $this->store($request->merge(['id' => $id])); 
    }

    // Hapus poster
    public function delete($id)
    {
        $poster = Poster::findOrFail($id); // Temukan poster berdasarkan ID

        // Hapus gambar dari storage jika ada
        if ($poster->img_url) {
            Storage::delete($poster->img_url); // Hapus gambar
        }

        $poster->delete(); // Hapus poster

        return redirect()->route('poster.admin')->with('success', 'Poster berhasil dihapus.');
    }

}
