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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->decimal('speed')->default(0.00);
            $table->decimal('passing_accuracy')->default(0.00);
            $table->decimal('shot_power')->default(0.00);
            $table->decimal('dribbling')->default(0.00);
            $table->decimal('defense')->default(0.00);
            $table->decimal('physical')->default(0.00);
            $table->decimal('total_rating')->default(0.00);
            $table->string('player_id');
            $table->string('player_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
