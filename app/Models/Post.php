<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public function __construct(
        public string $title,
        public string $excerpt,
        public int $date,
        public string $body,
        public string $slug
    ) {
    }

    /**
     * Return all posts content from files at 'resources/posts'
     *
     * @return Collection
     */
    public static function all()
    {
        // get all files stored at 'resource/posts'
        // notice: files will be sorted by name. this will affect the order of
        // posts in the return value
        $files = File::files(resource_path('posts'));

        // get the content of every post file
        $posts = collect($files)
            ->map(function ($file) {
                // parse post meta data and create new Post object for every post
                return YamlFrontMatter::parseFile((string) $file);
            })

            ->map(function ($document) {
                // cache the post content in the memory for 5 seconds
                // in real world app, you may want to set the cache for more than 5 seconds
                // you may also use `now()->addSeconds(5)` instead of writing number of
                // seconds. See https://laravel.com/docs/9.x/helpers#method-cache
                // you may also want to use arrow function instead of anonymous function
                $post = cache()->remember("posts.{$document->slug}", 5, function () use ($document) {
                    return new Post(
                        $document->title,
                        $document->excerpt,
                        $document->date,
                        $document->body(),
                        $document->slug
                    );
                });

                return $post;
            })->sortByDesc('date');

        return $posts;
    }

    /**
     * Search for post file by its slug and return the content of the file if
     * it's exist
     *
     * @param String $slug
     * @return Post
     */
    public static function find($slug)
    {
        return static::all()->firstWhere('slug', $slug);
    }


    /**
     * Search for post file by its slug and return the content of the file if
     * it's exist
     *
     * @param String $slug
     * @return Post
     */
    public static function findOrFail($slug)
    {
        $post = static::find($slug);
        if (!$post) {
            throw new ModelNotFoundException();

            // no problem if we used `abort(404)` too` but its better to use
            // Eloquent functions and classes because this file is a model
            // abort(404);

            // we can redirect the user to another page (e.g. home page)
            // the address bar in the browser will contain fragment
            // identifier (#debug)
            // return redirect('/');
        }

        return $post;
    }
}
