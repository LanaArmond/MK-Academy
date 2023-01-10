<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function personal()
    {
        return $this->belongsTo
        (
            User::class,
            'personal_id',
            'id'
        );
    }

    public function client()
    {
        return $this->belongsTo
        (
            User::class,
            'client_id',
            'id'
        );
    }

    public function exercises()
    {
        return $this->belongsToMany(
            Exercise::class,
            'card_exercise',
            'card_id',
            'exercise_id',
        );
    }
}

// php artisan make:migration add_personal_id_to_cards
// php artisan make:migration add_client_id_to_cards
// php artisan make:migration create_card_exercise_table --create=card_exercise
