<?php

namespace Database\Factories;

use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Pelanggan>
 */
class PelangganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->name();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'jabatan' => fake()->jobTitle(),
            'instansi' => fake()->company(),
            'kutipan' => fake()->sentence(15),
            'bintang' => 5,
            'photo' => null,
            'sort' => fake()->numberBetween(0, 20),
            'is_published' => true,
        ];
    }
}
