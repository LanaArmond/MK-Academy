<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Personal extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $guarded = [];

    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = Crypt::encrypt($value);
    }

    public function getNameAttribute($value)
    {
        if (is_null($value)) {
            return $value;
        }
        return Crypt::decrypt($value);
    }
}
