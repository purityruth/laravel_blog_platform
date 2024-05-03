<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch all posts
        $posts = Post::with(['author', 'category'])->get(); 

        // Pass the posts to the dashboard view
        return view('dashboard', compact('posts'));
    }
}
