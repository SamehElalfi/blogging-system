<?php

namespace App\Http\Controllers;


use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index');
    }

    function create()
    {
        return view('admin.posts.create');
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

        return redirect()->back()
            ->with('success', 'Post created successfully');
    }
}
