<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function index () {
    	$students = Student::with('registered_courses')->with('registered_courses.course')->get();


    	// dd($students->toArray());
    	return view('student.index')->with('students', $students);
    }

    public function index_2 () {
    	$min_credit = 2;

    	$students = Student::with('registered_courses')
		    	->with(['registered_courses.course' => function ($query) use ($min_credit) {
		    		$query->where('credit', '>=', $min_credit)->select('id', 'name');
		    	}])
		    	->get();

    	return view('student.index')->with('students', $students);
    }
}



/*

create table students (
	id int primary key auto_increment,
	name text not null,
	email text not null,
	created_at timestamp,
	updated_at timestamp,
	deleted_at timestamp
);

create table courses (
	id int primary key auto_increment,
	name text not null,
	c_no text not null,
	credit int(1) not null,
	created_at timestamp,
	updated_at timestamp,
	deleted_at timestamp
);

create table registered_courses (
	id int primary key auto_increment,
	student_id int references students(id),
	course_id int references courses(id),
	created_at timestamp,
	updated_at timestamp,
	deleted_at timestamp
);

insert into students (name, email) values ('Ali', 'alitsk99@gmail.com'), ('Mohammed', 'mo78@hotmail.com');

insert into courses (name, c_no, credit) values ('JAVA', 'SDEV2201', 3), ('Web 2 Programming', 'MOBC3213', 3), ('Laravel Course', 'SDEV4133', 3);

insert into registered_courses (student_id, course_id) values (1, 1), (1, 2), (2, 1), (2, 3);

*/