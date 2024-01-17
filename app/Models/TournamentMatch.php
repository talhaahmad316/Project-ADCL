<?php

namespace App\Models;
use App\Models\Team;
use App\Models\TournamentMatch;
use App\Models\AdminTournament;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentMatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'matchName',
        'team_id',
        'matchNo',
        'matchDate',
        'format',
        'week',
        'startTime',
        'finishTime',
        'reportingTime',
        'image',
    ];

    // Define the relationship to the Team model
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function touranment()
    {
        return $this->belongsTo(Tournament::class);
    }
}
