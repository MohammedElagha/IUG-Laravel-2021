<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function create () {
    	return view('student.create');
    }

    public function store (Request $request, $collage_id) {
    	// GET
    	# $birth_date = $request->query('birth_date');
    	# $birth_date = $request['birth_date'];

    	// POST
    	# $birth_date = $request['birth_date'];

    	// Headers
    	$content_type = $request->header('Content-Type');

    	#####################################################

    	// GET
    	$birth_date = '';

    	if ($request->query->has('birth_date')) {
    		$birth_date = $request->query('birth_date');
    	}



    	// POST

    	$birth_date = '';

    	if ($request->has('birth_date')) {
    		$birth_date = $request['birth_date'];
    	}


    	// Headers

    	if ($request->headers->has('Content-Type')) {

    	}
    }
}
