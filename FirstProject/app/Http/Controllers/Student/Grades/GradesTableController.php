<?php

namespace App\Http\Controllers\Student\Grades;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GradesTableController extends Controller
{
    public function get_grades () {
    	$name = "Mohammed Agha";
    	$age = 29;
    	$grades = [88, 89, 70, 45];

    	return view('Profile.grades')->with('student_name', $name)->with('age', $age)->with('grades', $grades);
    }
}
