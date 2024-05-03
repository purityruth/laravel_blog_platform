<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;

// Define an endpoint that returns the list of blog posts in JSON format
Route::get('/posts', [PostController::class, 'index'])->name('api.posts.index');
