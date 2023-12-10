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
        $mainImg = [
            'hero_1.jpg',
            'hero_2.jpg',
            'hero_3.jpg',
            'hero_4.jpg',
            'hero_5.jpg',
            'hero_6.jpg',
        ];
        $prevImg = [
            'img_1_horizontal.jpg',
            'img_2_horizontal.jpg',
            'img_3_horizontal.jpg',
            'img_4_horizontal.jpg',
            'img_5_horizontal.jpg',
            'img_6_horizontal.jpg',
        ];
        return [
            'user_id' => 1,
            'category_id' => fake()->numberBetween(1, 4),
            'main_img' => fake()->randomElement($mainImg),
            'preview_img' => fake()->randomElement($prevImg),
            'title' => fake()->sentence(8),
            'content' => fake()->text(1000),
        ];
    }
}
