<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mechanic extends Model
{
    use SoftDeletes;

    public function cars () {
    	return $this->hasMany('App\Car');
    }
}


// id, name