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
    // what if the file doesn't exist or the `$slug` is malicious code
    // its only for learning purposes
    $post = file_get_contents(__DIR__ . "/../resources/posts/{$slug}.html");

    return view(
        'post',
        ['post' => $post]
    );
});
