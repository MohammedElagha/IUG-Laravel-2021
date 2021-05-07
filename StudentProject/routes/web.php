<?php

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

Route::get('student/create', 'Student\StudentController@create');	// GET
Route::post('student/store', 'Student\StudentController@store');	// POST
Route::get('student', 'Student\StudentController@index');	// GET
Route::get('student/edit/{id}', 'Student\StudentController@edit');	// GET
Route::put('student/update/{id}', 'Student\StudentController@update');		// PUT, PATCH
Route::post('student/delete/{id}', 'Student\StudentController@destroy');	// DELETE

