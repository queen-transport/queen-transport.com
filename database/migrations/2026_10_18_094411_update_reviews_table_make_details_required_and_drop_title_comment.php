<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Isi default value jika ada data lama yang masih null sebelum diubah ke not null
        DB::table('reviews')->whereNull('car_review')->update(['car_review' => 'Kondisi armada bersih dan nyaman.']);
        DB::table('reviews')->whereNull('driver_review')->update(['driver_review' => 'Driver ramah dan profesional.']);
        DB::table('reviews')->whereNull('facilities_review')->update(['facilities_review' => 'Kualitas fasilitas dan layanan memuaskan.']);

        Schema::table('reviews', function (Blueprint $table) {
            $table->string('car_review')->nullable(false)->change();
            $table->string('driver_review')->nullable(false)->change();
            $table->string('facilities_review')->nullable(false)->change();

            $table->dropColumn(['title', 'comment']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->string('title')->nullable()->after('rating');
            $table->text('comment')->nullable()->after('title');

            $table->string('car_review')->nullable()->change();
            $table->string('driver_review')->nullable()->change();
            $table->string('facilities_review')->nullable()->change();
        });
    }
};
