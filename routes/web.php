<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth', 'verified')->group(function () {
Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/articles/create', [UserController::class, 'create'])->name('articles.create');
    Route::post('/articles/store', [UserController::class, 'store'])->name('articles.store');
});



require __DIR__.'/auth.php';
