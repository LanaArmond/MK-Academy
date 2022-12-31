<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Equipament extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function deleteImage():void
    {
        if($this->image != 'default.jpg'){
            Storage::delete('public/img/equipaments/' . $this->image);
        }
    }

    public function getImageUrlAttribute():string
    {
        return Storage::url('img/equipaments/' . $this->image);
    }

}
