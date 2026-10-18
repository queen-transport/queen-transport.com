<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Mengubah kolom `model_id` di tabel `media` dari unsignedBigInteger
     * menjadi varchar(36) agar mendukung UUID sebagai foreign key (morph).
     * Ini diperlukan karena model seperti Review menggunakan UUID sebagai primary key.
     */
    public function up(): void
    {
        // Drop index morph yang lama terlebih dahulu
        Schema::table('media', function (Blueprint $table) {
            $table->dropIndex('media_model_type_model_id_index');
        });

        // Ubah tipe kolom model_id menjadi string (varchar 36) untuk mendukung UUID
        DB::statement('ALTER TABLE `media` MODIFY `model_id` VARCHAR(36) NOT NULL');

        // Buat ulang index morph
        Schema::table('media', function (Blueprint $table) {
            $table->index(['model_type', 'model_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop index morph
        Schema::table('media', function (Blueprint $table) {
            $table->dropIndex('media_model_type_model_id_index');
        });

        // Kembalikan ke unsignedBigInteger
        DB::statement('ALTER TABLE `media` MODIFY `model_id` BIGINT UNSIGNED NOT NULL');

        // Buat ulang index morph
        Schema::table('media', function (Blueprint $table) {
            $table->index(['model_type', 'model_id']);
        });
    }
};
