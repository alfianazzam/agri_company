<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;

class AgendaController extends Controller
{
    // Display a list of all agendas on the landing page
    public function index()
    {
        // Use pagination to get agendas, displaying 6 per page for example
        $agendas = Agenda::orderBy('date', 'desc')->paginate(6);
        return view('page.landing.pages.agenda.index', compact('agendas'));
    }

    // Display agenda details
    public function show($id)
    {
        $agenda = Agenda::findOrFail($id);
        return view('page.landing.pages.agenda.show', compact('agenda') );
    }

    // Admin view for managing agendas
    public function admin()
    {
        $agendas = Agenda::all();
        return view('page.admin.services.agenda.index', compact('agendas'));
    }

    // Store a new agenda or update an existing one
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'required',
            'status' => 'required',
            'img_url' => 'nullable|image',
        ]);

        $agenda = $request->id ? Agenda::findOrFail($request->id) : new Agenda;

        $agenda->title = $request->input('title');
        $agenda->description = $request->input('description');
        $agenda->date = $request->input('date');
        $agenda->location = $request->input('location');
        $agenda->status = $request->input('status');

        if ($request->hasFile('img_url')) {
            if ($agenda->img_url) {
                \Storage::delete($agenda->img_url); // delete old image
            }
            $agenda->img_url = $request->file('img_url')->store('images/agendas', 'public');
        }

        $agenda->save();

        return redirect()->route('agenda.admin')->with('success', 'Agenda successfully saved.');
    }

    // Delete agenda
    public function delete($id)
    {
        $agenda = Agenda::findOrFail($id);

        if ($agenda->img_url) {
            \Storage::delete($agenda->img_url); // delete image
        }

        $agenda->delete();

        return redirect()->route('agenda.admin')->with('success', 'Agenda successfully deleted.');
    }
}
