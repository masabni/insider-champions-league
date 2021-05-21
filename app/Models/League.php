<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'team_id',
        'points',
        'played',
        'won',
        'draw',
        'goal_difference',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
