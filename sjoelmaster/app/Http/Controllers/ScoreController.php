<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Score;

class ScoreController extends Controller
{
    /**
     * Toon het formulier om een score in te voeren.
     */
    public function showForm()
    {
        $users = User::all();
        return view('score-form', compact('users'));
    }

    /**
     * Sla een nieuwe score op in de database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user' => 'required|exists:users,id', // Controleer of de gebruiker bestaat op basis van het ID in de users-tabel
            'score' => 'required|integer',
        ]);

        $user = User::find($validated['user']); // Zoek de gebruiker direct op ID

        if (!$user) {
            return redirect()->back()->withErrors(['user' => 'De opgegeven gebruiker bestaat niet.'])->withInput();
        }

        // Maak een nieuw score-object aan en sla het op
        $score = new Score;
        $score->user_id = $user->id;
        $score->score = $validated['score'];
        $score->save();

        return redirect('/score-form')->with('success', 'Score opgeslagen!');
    }
}
