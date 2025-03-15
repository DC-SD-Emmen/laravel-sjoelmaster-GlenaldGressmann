<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\CompetitieController;

// Dashboard Routes
Route::get('/', [DashboardController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

// Score Routes
Route::get('/score-form', [ScoreController::class, 'showForm'])->name('score.form');
Route::post('/score-form', [ScoreController::class, 'store'])->name('score.store');
Route::get('/score-form', [ScoreController::class, 'showForm'])->name('score-form');
Route::post('/scores', [ScoreController::class, 'store'])->name('scores.store');

// Gebruikersroutes
Route::resource('users', UserController::class);
Route::get('users/create', [UserController::class, 'create'])->name('users.create');
Route::post('users', [UserController::class, 'store'])->name('users.store');

// Scorebeheer voor gebruikers
Route::get('/users/{user}/scores', [UserController::class, 'showScores'])->name('users.scores');
Route::get('/users/{user}/scores/{score}/edit', [UserController::class, 'editScoreForm'])->name('users.scores.edit');
Route::put('/users/{user}/scores/{score}', [UserController::class, 'updateScore'])->name('users.scores.update');
Route::delete('/users/{user}/scores/{score}', [UserController::class, 'deleteScore'])->name('users.scores.delete');

// Games Routes
Route::resource('games', GamesController::class);
Route::get('/games', [GamesController::class, 'games'])->name('games');
Route::get('/games/create', [GamesController::class, 'create'])->name('games.create');
Route::post('/games/store', [GamesController::class, 'store'])->name('games.store');

// Competitie Routes
Route::get('/competitie/create', [CompetitieController::class, 'create'])->name('competitie.create');
Route::post('/competitie/store', [CompetitieController::class, 'store'])->name('competitie.store');

// Profielroutes (vereist authenticatie)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authenticatieroutes
require __DIR__.'/auth.php';
