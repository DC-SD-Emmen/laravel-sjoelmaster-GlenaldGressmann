<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testcontroller;
use App\Http\Controllers\sjoelmaster;
Route::get('/', function () {
    return view('welcome');
});
Route::resource('scores', sjoelmaster::class);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/test', [testcontroller::class, 'test'])->name('test');
Route::get('/home', [sjoelmaster::class, 'home'])->name('home');

require __DIR__.'/auth.php';

