<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Galeri::factory()->count(10)->create();
    }
}
