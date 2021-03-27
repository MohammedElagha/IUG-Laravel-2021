<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function create () {
        $postal_codes = ['966', '970', '962'];
        $default_birth_date = '1980/12/25';
        $default_postal_code = '970';

    	return view('student.create')->with('postal_codes', $postal_codes)->with('default_birth_date', $default_birth_date)->with('default_postal_code', $default_postal_code);
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

        // return
        return redirect('student/create');
    }
}
