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


Route::post('owner', 'OwnerController@index');
Route::get('car', 'CarController@index');
Route::get('mechanic', 'MechanicController@index');
Route::get('student', 'StudentController@index');
Route::get('student/withMainCourses', 'StudentController@index_2');

Route::get('car/create', 'CarController@create');
Route::post('car/store', 'CarController@store');


// get, post, put, patch, delete