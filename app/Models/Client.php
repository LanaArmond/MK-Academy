<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Client extends Model
{
    use HasFactory;

    public function getDecrypted($value){
        return Crypt::decryptString($value);
    }

    protected $guarded = [];

    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}
