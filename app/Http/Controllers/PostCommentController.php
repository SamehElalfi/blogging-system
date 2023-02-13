<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function store(Post $post)
    {
        // validate the request
        $fields = request()->validate([
            'body' => ['required', 'min:3']
        ]);

        // store the comment with associated post and author
        $post->comments()->create([
            'body'      => $fields['body'],
            'user_id'   => auth()->id(),
            'post_id'   => $post->id
        ]);

        // return back with flash message
        return redirect()->back()
            ->with('success', 'Your comment was created successfully!');
    }
}
