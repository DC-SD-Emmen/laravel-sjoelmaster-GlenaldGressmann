<?php

namespace App\Http\Controllers;

use App\Models\Competitie;
use Illuminate\Http\Request;

class CompetitieController extends Controller
{
    // Toon het formulier voor het aanmaken van een nieuwe competitie
    public function create()
    {
        return view('competitie.create'); // Zorg ervoor dat je view de naam 'competitie.create' heeft
    }

    // Sla de gegevens van de nieuwe competitie op
    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'finish_date' => 'required|date',
        ]);

        // Maak een nieuw competitie record aan
        Competitie::create([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'finish_date' => $request->finish_date,
        ]);

        // Redirect terug met een succesbericht
        return redirect()->route('competitie.create')->with('success', 'Competitie succesvol toegevoegd!');
    }
}
