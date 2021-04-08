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

    	# insert into students (name, birth_date, nationality) values ('$name', '$birth_date', '$nationality')

        $result = DB::table('students')->insert(['name' => $name , 'birth_date' => $birth_date , 'nationality' => $nationality]);

        dd($result);
    }

    public function index () {
        $students = DB::table('students')
                    ->select('id', 'name', 'nationality', 'birth_date')
                    ->get();
        # collection of objects

        return view('student.index')->with('students', $students);
    }

    public function edit ($id) {
        $student = DB::table('students')->where('id', $id)->first();

        $nationalities = ["PAL" => "Palestinian" , "SYR" => "Syrian"];

        return view('student.edit')->with('student', $student)->with('nationalities', $nationalities);
    }

    public function update (Request $request, $id) {
    	$name = $request['name'];
    	$birth_date = $request['birth_date'];
    	$nationality = $request['nationality'];

    	$result = DB::table('students')->where('id', $id)->update(['name' => $name , 'birth_date' => $birth_date , 'nationality' => $nationality]);

        return redirect()->back();
    }

    public function destroy ($id) {
    	$result = DB::table('students')->where('id', $id)->delete();
        return redirect()->back();
    }
}
