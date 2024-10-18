<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class AdminController extends Controller
{
    // Menampilkan halaman utama admin
    public function index()
    {
        $messages = Message::all(); // Ambil semua pesan
        return view('page.admin.index', compact('messages')); // Ganti dengan nama view Anda
    }
}
