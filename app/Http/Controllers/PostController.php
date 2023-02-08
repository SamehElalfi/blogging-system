<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index()
    {
        $posts = Post::latest()
            ->with('author', 'category')
            ->filter(request(['search', 'category', 'author']))
            ->paginate(6)->withQueryString();

        return view('posts.index', compact('posts'));
    }

    function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
