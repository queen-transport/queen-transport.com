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
            'car_review' => fake()->sentence(8),
            'driver_review' => fake()->sentence(8),
            'facilities_review' => fake()->sentence(8),
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
