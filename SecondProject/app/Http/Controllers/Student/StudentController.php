<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function create () {
    	return view('student.create');
    }

    public function store () {
    	
    }
}
