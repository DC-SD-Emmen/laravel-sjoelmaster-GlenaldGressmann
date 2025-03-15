<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

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

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    // Show all scores for a user
    public function showScores(User $user)
    {
        $scores = Score::where('user_id', $user->id)->get();
        return view('users.scores', compact('user', 'scores'));
    }

    // Show the edit form for a score
    public function editScoreForm(User $user, Score $score)
    {
        return view('users.edit-score', compact('user', 'score'));
    }

    // Update a score
    public function updateScore(Request $request, User $user, Score $score)
    {
        $request->validate([
            'score' => 'required|numeric'
        ]);

        $score->update(['score' => $request->score]);

        return redirect()->route('users.scores', $user)->with('success', 'Score updated successfully!');
    }

    // Delete a score
    public function deleteScore(User $user, Score $score)
    {
        $score->delete();

        return redirect()->route('users.scores', $user)->with('success', 'Score deleted successfully!');
    }
}
