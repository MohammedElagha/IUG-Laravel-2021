<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('test/test/testesn', function () {
// 	return view('test');
// });

// Route::get('student/profile/grades', function () {
// 	return view('Profile.grades', ['name' => 'Mohammed', 'gpa' => 99.4, 'courses' => ['JAVA 1', 'JAVA 2', 'Web 1', 'Networks']]);
// } );

// Route::get('student/profile/finance', function () {
// 	return view('Profile.finance');
// });


// Route::get('student/info/finance', function () {
// 	return view('Info.finance_info');
// });
// Route::get('student/info/academic', function () {
// 	return view('Info.academic_info');
// });
// Route::get('student/info/personal', function () {
// 	return view('Info.personal_info');
// });


// Route::get('student/profile/timetable', function () {
// 	return view('Profile.timetable');
// });

// Route::get('student/profile/my-grades', 'MyFirstController@get_my_name');

// Route::get('students/get/data', 'MyFirstController@get_data');
// Route::get('students/get/{student_id}/{student_name}', 'MyFirstController@get_student');

// Route::get('students/{student_id}/get', 'MyFirstController@get_student');
// Route::get('students/{student_id}/get/{student_name}', 'MyFirstController@get_student');


Route::get('student/grades/view', 'Student\Grades\GradesTableController@get_grades');
