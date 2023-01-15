<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('posts');
});

Route::get('posts/{post}', function ($slug) {
    // dangerous code don't use it in real-life app
    // what if the `$slug` is malicious code
    // its only for learning purposes
    $path = __DIR__ . "/../resources/posts/{$slug}.html";
    if (!file_exists($path)) {
        abort(404);

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


    return view(
        'post',
        ['post' => $post]
    );
})->where('post', '[A-z_\-]+');
