<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    use HasFactory;

    protected $table = 'matches';

    protected $fillable = [
        'week',
        'first_team',
        'second_team',
        'first_team_goals',
        'second_team_goals',
    ];

    public function week()
    {
        return $this->belongsTo(Week::class);
    }

    public function firstTeam()
    {
        return $this->belongsTo(Team::class, 'first_team');
    }

    public function secondTeam()
    {
        return $this->belongsTo(Team::class, 'second_team');
    }
}
