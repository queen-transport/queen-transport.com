<?php

namespace Database\Factories;

use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Review>
 */
class ReviewFactory extends Factory
{
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'rating' => fake()->numberBetween(4, 5),
            'title' => fake()->sentence(4),
            'comment' => fake()->paragraph(),
            'car_review' => fake()->optional(0.7)->sentence(6),
            'driver_review' => fake()->optional(0.7)->sentence(6),
            'facilities_review' => fake()->optional(0.7)->sentence(6),
            'status' => Review::STATUS_APPROVED,
            'created_by_admin' => false,
        ];
    }

    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => Review::STATUS_PENDING,
        ]);
    }

    public function rejected(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => Review::STATUS_REJECTED,
        ]);
    }

    public function byAdmin(): static
    {
        return $this->state(fn (array $attributes) => [
            'created_by_admin' => true,
        ]);
    }
}
