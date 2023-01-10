<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Client extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function getDecrypted($value){
        return Crypt::decryptString($value);
    }

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

    public function setCpfAttribute($value)
    {
        $this->attributes['cpf'] = Crypt::encrypt($value);
    }

    public function getCpfAttribute($value)
    {
        if (is_null($value)) {
            return $value;
        }
        return Crypt::decrypt($value);
    }

    public function setNumberAttribute($value)
    {
        $this->attributes['number'] = Crypt::encrypt($value);
    }

    public function getNumberAttribute($value)
    {
        if (is_null($value)) {
            return $value;
        }
        return Crypt::decrypt($value);
    }
}
