<?php

use Illuminate\Support\Facades\Route;
use App\Models\Player;
use App\Models\Score;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\ProfileController;
Route::get('/admin', function () {
    // Admin only page
})->middleware(CheckRole::class.':admin');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Form to input scores
Route::get('/score-form', function () {
    $players = Player::all();
    return view('score-form', compact('players'));
})->name('score.form');


Route::post('/scores', function (Request $request) {
    $validated = $request->validate([
        'player' => 'required|string|max:255',
        'score' => 'required|integer',
    ]);

    // Check if the player exists
    $player = Player::where('name', $validated['player'])->first();

    if (!$player) {
        return redirect()->back()->withErrors(['player' => 'De opgegeven speler bestaat niet.'])->withInput();
    }

    // Save the score
    $score = new Score;
    $score->player_id = $player->id;
    $score->score = $validated['score'];
    $score->save();

    return redirect('/score-form')->with('success', 'Score opgeslagen!');
})->name('scores.store');


// Add player route
Route::get('/add-player', function () {
    $player = new Player;
    $player->name = 'Kanker';
    $player->save();

    return 'Player added!';
});

require __DIR__.'/auth.php';
