<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;
    protected $fillable = ['club_name', 'parent_club', 'country', 'description', 'club_logo'];

    public function parentClub()
    {
        return $this->belongsTo(Club::class, 'parent_club');
    }
}
