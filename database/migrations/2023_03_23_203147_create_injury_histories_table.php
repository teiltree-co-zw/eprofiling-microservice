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
        Schema::create('injury_histories', function (Blueprint $table) {
            $table->id();
            $table->string('player_id');
            $table->string('player_name');
            $table->date('injury_date');
            $table->string('injury_period');
            $table->string('injury_desc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('injury_histories');
    }
};
