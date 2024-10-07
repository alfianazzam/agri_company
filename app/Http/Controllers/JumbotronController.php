<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jumbotron;
use Illuminate\Support\Str;

class JumbotronController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jumbos = Jumbotron::all();
        return view('page.admin.pages.jumbotron.index', compact('jumbos'));
    }

    public function show()
    {
        $jumbos = Jumbotron::all();
        return view('components.jumbotron.live', [
            'showHeader' => false,
            'showFooter' => false,
            'jumbos' => $jumbos,
        ]);
    }


     // Menyimpan Jumbotron baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'image_url' => 'required|image' // Pastikan tipe validasinya adalah 'image'
        ]);

        // Mendapatkan ekstensi file
        $extension = $request->file('image_url')->getClientOriginalExtension();
        // Membuat nama unik untuk file
        $imageName = Str::random(10) . '.' . $extension; // atau uniqid() . '.' . $extension;

        // Menyimpan gambar ke dalam folder public/img/jumbotron/
        $image_urlPath = $request->file('image_url')->storeAs('images/jumbotron', $imageName, 'public');

        Jumbotron::create([
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'image_url' => $image_urlPath, // Menyimpan path yang sesuai
        ]);


        return redirect()->route('about')->with('success', 'Jumbotron berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $jumbo = Jumbotron::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'image_url' => 'image|nullable' // Gambar baru bersifat opsional
        ]);

        // Update fields
        $jumbo->title = $request->input('title');
        $jumbo->subtitle = $request->input('subtitle');

        // Hanya simpan gambar jika diupload
        if ($request->hasFile('image_url')) {
            // Hapus gambar lama jika ada
            if ($jumbo->image_url) {
                \Storage::delete('public/' . $jumbo->image_url); // Hapus gambar lama
            }

            // Menyimpan gambar baru
            $image_urlPath = $request->file('image_url')->store('images/jumbotron', 'public');
            $jumbo->image_url = $image_urlPath; // Update path gambar
        }

        $jumbo->save();

        return redirect()->route('about')->with('success', 'Jumbotron berhasil diperbarui.');
    }

    public function delete($id)
    {
        $jumbo = Jumbotron::findOrFail($id);

        // Hapus file gambar dari storage
        if (file_exists(public_path('storage/' . $jumbo->image_url))) {
            unlink(public_path('storage/' . $jumbo->image_url));
        }

        // Hapus record dari database
        $jumbo->delete();

        return redirect()->route('about')->with('success', 'Jumbotron berhasil dihapus.');
    }
}
