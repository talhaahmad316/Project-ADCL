<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    protected $fillable = [
        'matchName', // Add matchName to the fillable array
        'home_team',
        'away_team',
        'tournament_id',
        'matchNo',
        'matchDate',
        'format',
        'week',
        'startTime',
        'finishTime',
        'reportingTime',
        'image',
    ];
    use HasFactory;
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function touranment()
    {
        return $this->belongsTo(Tournament::class);
    }
}
