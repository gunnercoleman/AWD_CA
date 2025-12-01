<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*
Here is my Club Model. This represents the Club table in the database, and handles the logic related to the data.

It also lets us run queries, like $clubs = Club::all(); to get all clubs from the database.
*/

class Club extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'description',
        'image',
        'created_at',
        'updated_at'
    ];

    /* This establishes a one to many relationship with the player model. A club can have many players */

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    /* This establishes a many to many relationship with the league model. A club can compete in multiple leagues, and a league can contain multiple clubs */

    public function leagues()
    {
        return $this->belongsToMany(League::class);
    }
}
