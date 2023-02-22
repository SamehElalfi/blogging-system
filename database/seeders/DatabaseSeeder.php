<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

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
        DB::table('comments')->delete();
        DB::table('posts')->delete();
        DB::table('categories')->delete();
        DB::table('users')->delete();

        $user = User::factory()->create([
            'name' => 'John Doe',
            'username' => 'johndoe'
        ]);

        Post::factory(10)->create(['user_id' => $user->id]);
    }
}
