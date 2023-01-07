<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cards()
    {
        return $this->belongsToMany(
            Card::class,
            'card_exercise',
            'card_id',
            'exercise_id',
        );
    }
}
