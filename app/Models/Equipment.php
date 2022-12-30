<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $table='equipments';

    /**
     * Get the exercises for the Equipment.
     */
    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }
}
