<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function create () {
        $nationalities = ["PAL" => "Palestinian" , "SYR" => "Syrian"];

    	return view('student.create')->with('nationalities', $nationalities);
    }

    public function store (Request $request) {
    	$name = $request['name'];
    	$birth_date = $request['birth_date'];
    	$nationality = $request['nationality'];

    	$query = "INSERT INTO students (name, birth_date, nationality) VALUES ('$name', '$birth_date', '$nationality')";

    	$result = DB::statement($query);
    	// boolean

    	return redirect('student/create');
    }

    public function index () {
    	$query = "SELECT * FROM students";

    	$students = DB::select($query);

    	// dd($students);

    	return view('student.index')->with('students', $students);
    }

    public function edit ($id) {
    	$query = "SELECT * FROM students where id = $id limit 1";

    	$students = DB::select($query);

    	$student = $students[0];

    	// dd($student);

    	$nationalities = ["PAL" => "Palestinian" , "SYR" => "Syrian"];

    	return view('student.edit')->with('student', $student)->with('nationalities', $nationalities);
    }

    public function update (Request $request, $id) {
    	$name = $request['name'];
    	$birth_date = $request['birth_date'];
    	$nationality = $request['nationality'];

    	$query = "UPDATE students SET name = '$name', birth_date = '$birth_date', nationality = '$nationality' WHERE id = $id";

    	DB::statement($query);

    	return redirect()->back();
    }

    public function destroy ($id) {
    	$query = "DELETE FROM students where id = $id";
    	DB::statement($query);

    	return redirect()->back();
    }
}
