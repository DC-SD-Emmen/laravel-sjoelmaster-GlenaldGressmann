<?php

namespace App\Http\Controllers;

use App\Models\Competitie;
use Illuminate\Http\Request;

class CompetitieController extends Controller
{
    // Show the form for creating a new competetion
    public function create()
    {
        return view('competitie.create'); // Ensure your view is named 'competitie.create'
    }

    // Store the new competition details
    public function store(Request $request)
    {
        dd($request->all()); // Debug incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'finish_date' => 'required|date',
        ]);

        // Create the competition record
        Competitie::create([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'finish_date' => $request->finish_date,
        ]);

        // Redirect back with a success message
        return redirect()->route('competitie.create')->with('success', 'Competitie added successfully!');
    }
}
