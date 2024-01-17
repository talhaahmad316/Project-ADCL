<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'name', 'nationality', 'picture', 'height', 'gender', 'playing_role', 'batting_style', 'bowling_style', 'status', 'description'
    ];


    // Any additional model logic, relationships, or methods can be added here
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'player_team', 'player_id', 'team_id');
    }
    


}
