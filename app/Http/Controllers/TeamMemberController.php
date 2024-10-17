<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\TeamMember; // Mengimpor model TeamMember

class TeamMemberController extends Controller
{
    public function index()
    {
        // Ambil semua anggota tim
        $teamMembers = TeamMember::all();
        return view('page.admin.pages.teams.index', compact('teamMembers')); // Kirimkan anggota tim ke view
    }

    // Menampilkan anggota tim untuk live preview
    public function show()
    {
        $teamMembers = TeamMember::all(); // Menggunakan findOrFail untuk mendapatkan anggota tim atau throw 404 jika tidak ada
        return view('page.admin.pages.teams.show', [
            'showHeader' => false,
            'showFooter' => false,
            'teamMembers' => $teamMembers,
        ]); // Kirimkan anggota tim yang dipilih ke view
    }

    // Store untuk menambah atau memperbarui anggota tim
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
            'social_links' => 'nullable|array', // Validasi untuk array
        ]);

        // Jika ID ada, maka update, jika tidak maka tambah baru
        $teamMember = $request->id ? TeamMember::findOrFail($request->id) : new TeamMember;

        // Assign data input ke model
        $teamMember->name = $request->input('name');
        $teamMember->role = $request->input('role');
        $teamMember->description = nl2br($request->input('description')); // Mengubah newlines ke <br>

        // Proses gambar jika ada file yang di-upload
        if ($request->hasFile('image')) {
            if ($teamMember->image) {
                Storage::delete($teamMember->image); // Hapus gambar lama jika ada
            }
            $teamMember->image = $request->file('image')->store('images/team', 'public'); // Simpan gambar baru
        }

        // Mengonversi social_links menjadi JSON
        if ($request->has('social_links')) {
            $teamMember->social_links = json_encode($request->social_links); // Set social links sebagai JSON
        } else {
            $teamMember->social_links = null; // Atur ke null jika tidak ada social links
        }

        $teamMember->save();

        return redirect()->route('team.admin')->with('success', 'Team member berhasil disimpan.');
    }

    // Update anggota tim berdasarkan ID (gunakan fungsi store untuk menyederhanakan)
    public function update(Request $request, $id)
    {
        return $this->store($request->merge(['id' => $id])); 
    }

    // Hapus anggota tim
    public function delete($id)
    {
        $teamMember = TeamMember::findOrFail($id); // Temukan anggota tim berdasarkan ID

        // Hapus gambar dari storage jika ada
        if ($teamMember->image) {
            Storage::delete($teamMember->image); // Hapus gambar
        }

        $teamMember->delete(); // Hapus anggota tim

        return redirect()->route('team.index')->with('success', 'Team member berhasil dihapus.');
    }
}