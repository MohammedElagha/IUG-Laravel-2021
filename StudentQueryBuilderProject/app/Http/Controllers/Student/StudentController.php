<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Student;

// insert, update, delete, select


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

    	$student = new Student();
        $student->name = $name;
        $student->birth_date = $birth_date;
        $student->nationality = $nationality;

        $result = $student->save();
    }

    public function index () {
        $students = Student::select('id', 'name', 'nationality', 'birth_date')
                    ->get();
        # collection of objects

        return view('student.index')->with('students', $students);
    }

    public function edit ($id) {
        $student = DB::table('students')->where('id', '=', $id)->first();

        $nationalities = ["PAL" => "Palestinian" , "SYR" => "Syrian"];

        return view('student.edit')->with('student', $student)->with('nationalities', $nationalities);
    }

    public function update (Request $request, $id) {
    	$name = $request['name'];
    	$birth_date = $request['birth_date'];
    	$nationality = $request['nationality'];

    	// $result = Student::where('id', $id)->update(['name' => $name , 'birth_date' => $birth_date , 'nationality' => $nationality]);

        $student = Student::where('id', $id)->first();

        $student->name = $name;
        $student->birth_date = $birth_date;
        $student->nationality = $nationality;

        $student->save();

        return redirect()->back();
    }

    public function destroy ($id) {
    	$result = Student::where('id', $id)->delete();
        return redirect()->back();
    }

    public function restore ($id) {
        $result = Student::withTrashed()->where('id', $id)->restore();
        return redirect()->back();
    }
}



/*

Student::select('name', 'email')->get();
Student::withTrashed()->select('name', 'email', 'deleted_at')->get();
Student::onlyTrashed()->select('name', 'email', 'deleted_at')->get();


Student::join('registered_courses', 'students.id', 'registered_courses.student_id')
        ->join('courses', 'registered_courses.course_id', 'courses.id')
        ->whereNull('registered_courses.deleted_at');

*/




/*

select * from students where age >= 18 AND age < 25

$students = DB::table('students')->where('age', '>=', 18)->where('age', '<', 25)->get();


##################

select * from students where grade = 'A' OR grade = 'B'

$students = DB::table('students')->where('grade', 'A')->orWhere('grade', 'B')->get();

##################

select * from students where (age >= 18 AND age < 25) AND (grade = 'A' OR grade = 'B')

$min_age = 18;
$max_age = 25;

$students = DB::table('students')
    ->where(function ($query) use ($min_age, $max_age) {
        $query->where('age', '>=', $min_age);
        $query->where('age', '<', $max_age);
    })
    ->where(function ($query) {
        $query->where('grade', 'A');
        $query->orWhere('grade', 'B');
    })
    
##################

where('name', 'LIKE', "%$name%")

##################

is null , is not null

whereNull('academic_id')
whereNotNull('col_name')

##################

$arr = ['A' , 'B' , 'C']

whereIn('students.grade', $arr)

##################

whereRaw('students.grade = grades.final_grade')




############################################################################################################



employees -> id, name, phone
cars -> id, name, model, brand, employee_id

employees ... join cars on employees.id = cars.employee_id
select name as emp_name from employees

$employees = DB::table('employees')->leftJoin('cars', 'employees.id', 'cars.employee_id')
        ->select('employees.name as emp_name', 'cars.name as car_name')
        ->orderBy('cars.model', 'DESC')
        ->orderBy('cars.brand', 'ASC)
        ->groupBy('employees.id')
        ->limit(20)
        ->get();



*/