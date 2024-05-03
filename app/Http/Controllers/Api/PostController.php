<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->input('limit', 10);

        $posts = Post::with(['author', 'category'])
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();

        return PostResource::collection($posts);
    }
}
