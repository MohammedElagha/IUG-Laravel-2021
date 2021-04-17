<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Owner extends Model
{
    use SoftDeletes;

    public function car () {
    	return $this->belongsTo('App\Car');
    	// return $this->belongsTo('App\Car', 'car_id', 'id');
    }
}

// id, name, phone, car_id