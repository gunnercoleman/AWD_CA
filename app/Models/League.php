<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'description'];

    public function clubs()
    {
        return $this->belongsToMany(Club::class);
    }

}
