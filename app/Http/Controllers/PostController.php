<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Jobs\SendLatestArticlesEmail;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['author', 'category'])->get();
        return view('posts.index', compact('posts'));
    }

    public function search(Request $request)
    {
        // Get the search query from the request
        $query = $request->input('q');

        // Search for posts by title or author name
        $posts = Post::where('title', 'LIKE', '%' . $query . '%')
            ->orWhereHas('author', function ($q) use ($query) {
                $q->where('name', 'LIKE', '%' . $query . '%');
            })
            ->get();

        return view('posts.search', compact('posts', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'author_id' => 'required|integer',
            'category_id' => 'required|integer',
        ]);

        $newPost = Post::create($validated);

        // Dispatch the job to send email when a new post is created
        dispatch(new SendLatestArticlesEmail($newPost));

        return redirect()->route('posts.index')->with('status', 'New post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
