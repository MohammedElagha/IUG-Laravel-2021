<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Owner;

class OwnerController extends Controller
{
    public function index () {
    	$owners = Owner::with('car')->with('car.mechanic')->select('*')->get();
    	dd($owners->toArray());
    	// return view('owner.index')->with('owners', $owners);
    }
}


// owner 1-1  car  M-1 mechanic
// $owner->car->mechanic->name