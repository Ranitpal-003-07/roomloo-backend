<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // Store a new post
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user' => 'required|string|max:255',
            'userId' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|string',
            'likes' => 'nullable|integer',
            'comments' => 'nullable|array',
            'shares' => 'nullable|integer',
            'timestamp' => 'required|date',
        ]);

        $post = Post::create($validatedData);

        return response()->json([
            'message' => 'Post created successfully!',
            'post' => $post,
        ], 201);
    }

    // Optionally: Fetch all posts
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return response()->json($posts);
    }

    // Optionally: Fetch a single post
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return response()->json($post);
    }
}
