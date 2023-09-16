<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
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
        $paragraphs = $this->faker->paragraphs(random_int(4, 8));
        $body = collect($paragraphs)->map(fn($paragraph) => "<p>$paragraph</p>")->implode('');
        $excerpt = collect($paragraphs)->take(2)->map(fn($paragraph) => "<p>$paragraph</p>")->implode('');

        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'slug' => fake()->slug(),
            'title' => fake()->sentence(),
            'excerpt' => $excerpt,
            'body' => $body,
            'published_at' => fake()->dateTimeBetween('-1 year'),
        ];
    }
}
