<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Admin extends Model
{
    use HasFactory;

    public function getDecrypted($value){
        return Crypt::decryptString($value);
    }

    protected $fillable = [
        'name',
        'email',
        'password',
        'picture'
    ];
}
