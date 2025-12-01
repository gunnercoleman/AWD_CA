<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Player extends Model
{
    use HasFactory;

        protected $fillable = [
        'name',
        'age',
        'goals',
        'assits', 
        'position',
        'club_id',
    ];

    /* Vice versa, this establishes the relationship to the Club Model. Each player belongs to a single club. */

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
