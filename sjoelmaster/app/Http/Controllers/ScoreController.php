<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Score;

class ScoreController extends Controller
{
    public function showForm()
    {
        $users = User::all();
        return view('score-form', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user' => 'required|exists:users,id', // validate that user exists in users table based on id
            'score' => 'required|integer',
        ]);
    
        $user = User::find($validated['user']); // find user by the id directly
    
        if (!$user) {
            return redirect()->back()->withErrors(['user' => 'De opgegeven gebruiker bestaat niet.'])->withInput();
        }
    
        $score = new Score;
        $score->user_id = $user->id;
        $score->score = $validated['score'];
        $score->save();
    
        return redirect('/score-form')->with('success', 'Score opgeslagen!');
    }
    
}