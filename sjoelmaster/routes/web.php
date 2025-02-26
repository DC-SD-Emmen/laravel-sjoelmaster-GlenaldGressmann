<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Controller;    
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Index;



Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/', [DashboardController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::get('/score-form', [ScoreController::class, 'showForm'])->name('score.form');
Route::post('/score-form', [ScoreController::class, 'store'])->name('score.store');
Route::resource('users', UserController::class);
Route::get('users/create', [UserController::class, 'users.create']);
Route::get('users/create', [UserController::class, 'create'])->name('users.create');
Route::post('users', [UserController::class, 'store'])->name('users.store');








Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/score-form', [ScoreController::class, 'showForm'])->name('score-form');
Route::post('/scores', [ScoreController::class, 'store'])->name('scores.store');

require __DIR__.'/auth.php';
