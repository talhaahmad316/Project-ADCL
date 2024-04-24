<?php

namespace App\Models;
use App\Models\Team;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;
    protected $fillable = [
        'tournamentname',
        'tournamentLocation',
        'tournamentCountry',
        'tournamentStartTime',
        'tournamentEndTime',
        'tournamentStatus',
        'banner_image',
    ];
    // public function teams()
    // {
    //     return $this->belongsToMany(Team::class);
    // }
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_tournament', 'tournament_id', 'team_id');
    }



}

