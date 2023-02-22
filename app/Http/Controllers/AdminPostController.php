<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', ['posts' => Post::paginate(20)]);
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

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }
    public function update(Post $post)
    {

        $fields = request()->validate([
            'title' => ['required', 'max:255'],
            'excerpt' => ['required', 'max:255'],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'thumbnail' => ['image']
        ]);

        // Save the uploaded thumbnail into storage directory
        if (array_key_exists('thumbnail', $fields)) {
            $fields['thumbnail'] = request()->file('thumbnail')
                ->store('thumbnails');
        }

        $post->update($fields);

        return redirect()->back()
            ->with('Post updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->back()
            ->with('Post deleted!');
    }
}
