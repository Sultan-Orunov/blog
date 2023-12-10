<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $posts = Post::all();
        $id = [];
        foreach ($posts as $post){
            $id[] = $post->id;
        }
        return [
            'user_id' => 1,
            'post_id' => fake()->randomElement($id),
            'comment' => fake()->sentence(10)
        ];
    }
}
