<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * The Exercises that belong to the card.
     */
    public function exercises()
    {
        return $this->belongsToMany(Exercise::class)->withTimestamps();
    }
}
