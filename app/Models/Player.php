<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'club_id',
        '',
    ];
}
