<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'description'];

    /* This also establishes a many to many relationship with the Club model. A club can compete in multiple leagues, and a league can contain multiple clubs */
    public function clubs()
    {
        return $this->belongsToMany(Club::class);
    }

}
