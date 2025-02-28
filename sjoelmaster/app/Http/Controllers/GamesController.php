<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Game;
use App\Models\Competitie;

class GamesController extends Controller
{
    public function create()
    {
        $users = User::all();
        $competities = Competitie::all();
        return view('games.create', compact('users', 'competities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date', // Ensure start_date is required
            'competition_id' => 'required|exists:competities,id',
        ]);
        Game::create($validated);
        return redirect()->route('games.create')->with('success', 'Game created successfully!');
    }
}