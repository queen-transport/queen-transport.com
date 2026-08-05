<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Post>
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
        $title = fake()->unique()->sentence(6);

        return [
            'category_id' => null,
            'user_id' => null,
            'title' => rtrim($title, '.'),
            'slug' => Str::slug($title),
            'permalink_type' => 'date',
            'excerpt' => fake()->sentence(20),
            'content' => collect(fake()->paragraphs(5))->map(fn ($p) => "<p>{$p}</p>")->implode(''),
            'featured_image' => null,
            'meta_title' => null,
            'meta_description' => null,
            'og_image' => null,
            'status' => 'published',
            'published_at' => fake()->dateTimeBetween('-1 year'),
        ];
    }

    public function draft(): static
    {
        return $this->state(fn () => [
            'status' => 'draft',
            'published_at' => null,
        ]);
    }

    public function plainPermalink(): static
    {
        return $this->state(fn () => [
            'permalink_type' => 'plain',
        ]);
    }
}
