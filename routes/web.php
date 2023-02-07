<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
    $posts = Post::latest()->with('author', 'category')->get();
    $categories = Category::all();

    return view('posts', compact('posts', 'categories'));
});

Route::get('posts/{post:slug}', function (Post $post) {
    return view('post', compact('post'));
});

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts->load('category', 'author'),
        'categories' => Category::all(),
        'currentCategory' => $category
    ]);
});

Route::get('authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts->load('category', 'author'),
        'categories' => Category::all()
    ]);
});
