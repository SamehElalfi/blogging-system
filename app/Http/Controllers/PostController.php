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
            ->filter(request(['search']))
            ->get();
        $categories = Category::all();

        return view('posts', compact('posts', 'categories'));
    }

    function show(Post $post)
    {
        return view('post', compact('post'));
    }
}
