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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->string('matchName');
            $table->string('home_team');
            $table->string('away_team');
            $table->integer('tournament_id');
            $table->integer('matchNo');
            $table->date('matchDate');
            $table->string('format');
            $table->integer('week');
            $table->time('startTime');
            $table->time('finishTime');
            $table->time('reportingTime');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
