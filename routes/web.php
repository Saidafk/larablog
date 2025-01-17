<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
//use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [PublicController::class, 'dashboard'])->name('dashboard')->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {

    Route::get('/articles/create', [UserController::class, 'create'])->name('articles.create');
    Route::post('/articles/store', [UserController::class, 'store'])->name('articles.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    

    Route::get('/articles/{article}/edit', [UserController::class, 'edit'])->name('articles.edit');
    Route::post('/articles/{article}/update', [UserController::class, 'update'])->name('articles.update');

    Route::get('/articles/{article}/remove', [UserController::class, 'remove'])->name('articles.remove');

    Route::post('/comments/store/{article}', [CommentController::class, 'store'])->name('comments.store');

});

require __DIR__.'/auth.php';



Route::get('/{user}/{article}', [PublicController::class, 'show'])->name('public.show');

Route::get('/{user}', [PublicController::class, 'index'])->name('public.index');



