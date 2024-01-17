<?php

// database/migrations/xxxx_xx_xx_create_team_tournament_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamTournamentTable extends Migration
{
    public function up()
    {
        Schema::create('team_tournament', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('tournament_id');
            $table->timestamps();

            // Define foreign keys
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('tournament_id')->references('id')->on('tournaments')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('team_tournament');
    }
}
