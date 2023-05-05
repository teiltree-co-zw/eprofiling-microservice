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
        Schema::create('stats', function (Blueprint $table) {
            $table->id();
            $table->string('player_id');
            $table->string('player_name');
            $table->integer('goals')->default(0);
            $table->integer('assists')->default(0);
            $table->integer('saves')->default(0);
            $table->integer('games_played')->default(0);
            $table->integer('tackles_won')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stats');
    }
};
