<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

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

    function create()
    {
        return view('posts.create');
    }

    function store()
    {
        $fields = request()->validate([
            'title' => ['required', 'max:255'],
            'excerpt' => ['required', 'max:255'],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'thumbnail' => ['required', 'image']
        ]);

        // generate a new slug with random number
        $fields['slug'] = Str::slug($fields['title']) . '-' . rand(0, 10 ** 6);

        // Save the uploaded thumbnail into storage directory
        $fields['thumbnail'] = request()->file('thumbnail')
            ->store('thumbnails');

        // Create a new post associated with the current user
        auth()->user()->posts()->create($fields);

        return redirect('/')
            ->with('success', 'Post created successfully');
    }
}
