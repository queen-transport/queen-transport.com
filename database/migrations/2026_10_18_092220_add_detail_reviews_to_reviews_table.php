<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            // Ulasan detail: tentang mobil
            $table->string('car_review')->nullable()->after('comment');

            // Ulasan detail: tentang driver
            $table->string('driver_review')->nullable()->after('car_review');

            // Ulasan detail: tentang kualitas & fasilitas
            $table->string('facilities_review')->nullable()->after('driver_review');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn(['car_review', 'driver_review', 'facilities_review']);
        });
    }
};
