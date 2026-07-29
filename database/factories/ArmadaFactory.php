<?php

namespace Database\Factories;

use App\Models\Armada;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Armada>
 */
class ArmadaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->words(3, true);

        return [
            'title' => ucwords($title),
            'slug' => Str::slug($title),
            'car_type' => fake()->randomElement(['MPV Mewah', 'SUV Premium', 'Sedan Eksekutif', 'Alphard/Vellfire']),
            'car_badge' => fake()->randomElement(['Prestige', 'Populer', 'VIP', null]),
            'car_icon' => fake()->randomElement(['🚗', '🚙', '👑', '🚘']),
            'features' => fake()->randomElements([
                'AC Double Blower', 'Kursi Elektrik', 'TV LCD', 'Sunroof', 'Kulkas Mini', 'Karaoke',
            ], 3),
            'description' => fake()->paragraphs(2, true),
            'cta_text' => 'Tanya Harga via WhatsApp',
            'cta_url' => null,
            'featured_image' => null,
            'gallery' => [],
            'video' => null,
            'sort' => fake()->numberBetween(0, 20),
            'is_published' => true,
        ];
    }
}
