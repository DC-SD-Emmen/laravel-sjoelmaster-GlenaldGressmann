<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Controller;    
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Index;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\CompetitieController;




Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/', [DashboardController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::get('/score-form', [ScoreController::class, 'showForm'])->name('score.form');
Route::post('/score-form', [ScoreController::class, 'store'])->name('score.store');
Route::resource('users', UserController::class);
Route::get('users/create', [UserController::class, 'users.create']);
Route::get('users/create', [UserController::class, 'create'])->name('users.create');
Route::post('users', [UserController::class, 'store'])->name('users.store');
Route::get('/games', [GamesController::class, 'games'])->name('games');
Route::get('/competitie/create', [CompetitieController::class, 'create'])->name('competitie.create');
Route::post('/competitie/store', [CompetitieController::class, 'store'])->name('competitie.store');
Route::get('/games/create', [GamesController::class, 'create'])->name('games.create');
Route::post('/games/store', [GamesController::class, 'store'])->name('games.store');
Route::resource('games', GamesController::class);









Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/score-form', [ScoreController::class, 'showForm'])->name('score-form');
Route::post('/scores', [ScoreController::class, 'store'])->name('scores.store');

require __DIR__.'/auth.php';
