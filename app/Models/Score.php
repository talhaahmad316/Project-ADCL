<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    // Match.php
    protected $fillable = ['player_id', 'match_id', 'runs', 'balls_faced', 'fours', 'sixes', 'how_they_got_out'];

    // Relationship with home team
    public function homeTeam()
    {
        return $this->belongsTo(Team::class, 'home_team');
    }

    // Relationship with away team
    public function awayTeam()
    {
        return $this->belongsTo(Team::class, 'away_team');
    }
    public function players()
    {
        return $this->belongsToMany(Player::class, 'player_team');
    }
    
    public function player()
    {
        return $this->belongsTo(Player::class);
    }

}
