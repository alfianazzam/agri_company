<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // Menampilkan form untuk mengirim pesan
    public function create()
    {
        return view('components.contact.index'); // Ganti dengan nama view Anda
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        try {
            // Simpan pesan ke database
            Message::create([
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
            ]);

            // Set session success message
            return response()->json(['success' => true, 'message' => 'Your message has been sent successfully.']);
        } catch (\Exception $e) {
            // Log error dan set session error message
            \Log::error('Message sending failed: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error occurred! Please try again.']);
        }
    }

    // Menampilkan semua pesan yang diterima (opsional)
    public function index() 
    {
        $messages = Message::all(); // Ambil semua pesan
        return view('page.admin.index', compact('messages')); // Ganti dengan nama view Anda
    }
}