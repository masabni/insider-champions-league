<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    use HasFactory;

    public function matches()
    {
        return $this->hasMany('App\Models\Match');
    }

    public function scopePlayed($query)
    {
        return $query->where('played', 1);
    }

    public function setPlayed()
    {
        return $this->update(['played' => 1]);
    }
}
