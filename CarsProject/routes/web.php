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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});


Route::get('owner', 'OwnerController@index')->middleware(['lang', 'timezone']);
Route::get('car', 'CarController@index')->middleware(['auth']);
Route::get('mechanic', 'MechanicController@index')->middleware(['lang']);
Route::get('student', 'StudentController@index')->middleware(['timezone']);
Route::get('student/withMainCourses', 'StudentController@index_2')->middleware([]);

Route::get('car/create', 'CarController@create')->middleware([]);
Route::post('car/store', 'CarController@store')->middleware([]);


// get, post, put, patch, delete




