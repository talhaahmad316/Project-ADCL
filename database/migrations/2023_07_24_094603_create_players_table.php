<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('picture'); // Store the image filename
            $table->string('name');
            $table->string('nationality');
            $table->enum('gender', ['male', 'female', 'others']);
            $table->integer('height');
            $table->enum('playing_role', ['batsman', 'bowler', 'all_rounder', 'wicketkeeper_batsman', 'coach', 'umpire', 'manager', 'administrator']);
            $table->enum('batting_style', ['right_hand', 'left_hand']);
            $table->enum('bowling_style', ['right_arm_off_break', 'right_arm_leg_break', 'left_arm_chinaman', 'slow_right_arm_orthodox', 'slow_left_arm_orthodox', 'right_arm_medium_fast', 'right_arm_fast', 'left_arm_medium_fast', 'left_arm_fast', 'left_arm_wrist_spin']);
            $table->enum('status', ['active', 'inactive']);
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
