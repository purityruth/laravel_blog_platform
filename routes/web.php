<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;


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


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Home page with all posts
Route::get('/posts', [PostController::class, 'index']);

// All Authors
Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');

// Posts by author
Route::get('/authors/{id}', [AuthorController::class, 'show'])->name('authors.show');

//All Categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

// Posts by category
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

// Search query
Route::get('/search', [PostController::class, 'search'])->name('posts.search');


require __DIR__.'/auth.php';
