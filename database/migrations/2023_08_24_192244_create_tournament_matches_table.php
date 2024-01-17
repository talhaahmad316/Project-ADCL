<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentMatchesTable extends Migration
{
    public function up()
    {
        Schema::create('tournament_matches', function (Blueprint $table) {
            $table->id();
            $table->string('matchName');
            $table->foreignId('team_id')->constrained('teams'); // Assuming your teams table is named 'teams'
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

    public function down()
    {
        Schema::dropIfExists('tournament_matches');
    }
}
