<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyFirstController extends Controller
{
    public function get_my_name () {
    	$first_name = "Mohammed";
    	$last_name = "El-Agha";

    	$name = "$first_name $last_name";

    	$age = 29;

    	$grades = [99, 80, 78, 90];

    	return view('Profile.grades')->with('student_name', $name)->with('age', $age)->with('grades', $grades);
    }


    public function get_student ($student_id, $student_name) {
    	return view('student.personal_page')->with('student_id', $student_id);
    }


    public function get_data () {
        $first_name = "Mohammed";
        $last_name = "El-Agha";

        $name = "$first_name $last_name";

        $age = 29;

        $grades = [99, 80, 78, 90];

        return view('Profile.grades')->with('student_name', $name)->with('age', $age)->with('grades', $grades);
    }
}
