<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'category_id' => fake()->numberBetween(1, 4),
            'main_img' => fake()->imageUrl(1368, 644),
            'preview_img' => fake()->imageUrl(700, 440),
            'title' => fake()->sentence(8),
            'content' => fake()->text(1000),

        ];
    }
}
