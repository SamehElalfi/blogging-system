<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index()
    {
        $posts = Post::latest()
            ->with('author', 'category')
            ->filter(request(['search', 'category']))
            ->get();

        return view('posts', compact('posts'));
    }

    function show(Post $post)
    {
        return view('post', compact('post'));
    }
}
