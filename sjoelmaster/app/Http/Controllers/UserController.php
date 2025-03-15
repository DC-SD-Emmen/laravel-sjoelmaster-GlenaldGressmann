<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Toon een lijst van gebruikers met paginering.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Toon het formulier voor het aanmaken van een nieuwe gebruiker.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Sla een nieuwe gebruiker op in de database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->save();

        return redirect()->route('users.index')->with('success', 'Gebruiker succesvol aangemaakt.');
    }

    /**
     * Toon alle scores van een gebruiker.
     */
    public function showScores(User $user)
    {
        $scores = Score::where('user_id', $user->id)->get();
        return view('users.scores', compact('user', 'scores'));
    }

    /**
     * Toon het bewerkingsformulier voor een score.
     */
    public function editScoreForm(User $user, Score $score)
    {
        return view('users.edit-score', compact('user', 'score'));
    }

    /**
     * Werk een score bij.
     */
    public function updateScore(Request $request, User $user, Score $score)
    {
        $request->validate([
            'score' => 'required|numeric'
        ]);

        $score->update(['score' => $request->score]);

        return redirect()->route('users.scores', $user)->with('success', 'Score succesvol bijgewerkt!');
    }

    /**
     * Verwijder een score.
     */
    public function deleteScore(User $user, Score $score)
    {
        $score->delete();

        return redirect()->route('users.scores', $user)->with('success', 'Score succesvol verwijderd!');
    }
}
