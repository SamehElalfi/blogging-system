<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Delete database tables to prevent duplicate entry key for categories
        User::truncate();
        Category::truncate();
        Post::truncate();

        // Create new random user entry
        $user = User::factory()->create();

        // Generate posts and categories
        $categories = ['work', 'personal', 'hobbies'];
        foreach ($categories as $category) {
            $generated_category = Category::create([
                // make the first letter uppercase
                'name' => Str::title($category),
                'slug' => Str::slug($category),
            ]);

            Post::create([
                'title' => Str::title("my {$generated_category->name} post"),
                'slug' => Str::slug("my {$generated_category->slug} post"),
                'excerpt' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'user_id' => $user->id,
                'category_id' => $generated_category->id
            ]);
        }
    }
}
