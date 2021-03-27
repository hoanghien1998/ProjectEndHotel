<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $fillable=['roomNumber','typeCode','state'];

    function roomtype(){
        return $this->belongsTo('App\Roomtype');
    }
}
