<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score; 

class ScoreController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'player' => 'required|string|max:255',
        'score' => 'required|integer|min:0',
    ]);

    // Save the data (example)
    Score::create($validated);

    return redirect()->back()->with('success', 'Score saved successfully!');
}
}
