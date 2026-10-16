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
        Schema::create('armada_review', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('review_id')->constrained('reviews')->cascadeOnDelete();
            $table->foreignId('armada_id')->constrained('armadas')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['review_id', 'armada_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('armada_review');
    }
};
