<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post
{
    /**
     * Search for post file by its slug and return the content of the file if
     * it's exist
     *
     * @param String $slug
     * @return String|void
     */
    public static function find($slug)
    {
        // dangerous code don't use it in real-life app
        // what if the `$slug` is malicious code
        // its only for learning purposes
        $path = resource_path("posts/{$slug}.html");
        if (!file_exists($path)) {
            throw new ModelNotFoundException();

            // no problem if we used `abort(404)` too` but its better to use
            // Eloquent functions and classes because this file is a model
            // abort(404);

            // we can redirect the user to another page (e.g. home page)
            // the address bar in the browser will contain fragment
            // identifier (#debug)
            // return redirect('/');
        }

        // cache the post content in the memory for 5 seconds
        // in real world app, you may want to set the cache for more than 5 seconds
        // you may also use `now()->addSeconds(5)` instead of writing number of
        // seconds. See https://laravel.com/docs/9.x/helpers#method-cache
        // you may also want to use arrow function instead of anonymous function
        $post = cache()->remember("posts.{$slug}", 5, function () use ($path) {
            var_dump('reading from file not from memory');
            return file_get_contents($path);
        });

        return $post;
    }
}
