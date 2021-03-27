<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roomtype extends Model
{
    //
    protected $fillable=['name','images','price'];

    function room(){
        return $this->hasMany('App\Room');
    }
}
