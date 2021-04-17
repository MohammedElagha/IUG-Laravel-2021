<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mechanic;

class MechanicController extends Controller
{
    public function index () {
    	$mechanics = Mechanic::with('cars')->get();
    	// dd($mechanics);
    	return view('mechanic.index')->with('mechanics', $mechanics);
    }
}
