<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    public function registered_courses () {
    	return $this->hasMany('App\RegisteredCourse');
    }
}
