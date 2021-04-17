<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use SoftDeletes;

    public function owner () {
    	return $this->hasOne('App\Owner');
    	// return $this->hasOne('App\Owner', 'car_id', 'id');
    }

    public function mechanic () {
    	return $this->belongsTo('App\Mechanic');
    }
}

// id, model, mechanic_id