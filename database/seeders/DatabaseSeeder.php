<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@mail.ru',
         ]);
        \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@mail.ru',
        ]);

        Category::factory(4)->create();
        Post::factory(50)->create();
        Comment::factory(500)->create();
    }
}
