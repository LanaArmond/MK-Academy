<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * The cards that belong to the exercise.
     */
    public function cards()
    {
        return $this->belongsToMany(Card::class)->withTimestamps();
    }
}