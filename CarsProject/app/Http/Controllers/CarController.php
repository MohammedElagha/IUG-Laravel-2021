<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Mechanic;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CarRequest;

class CarController extends Controller
{ 
    public function index () {
    	$cars = Car::with('owner')->with('mechanic')->select('*')->get();

    	foreach ($cars as $car) {
    		$img_link = Storage::url($car->image);
    		$car->image = $img_link;
    	}

    	// dd($cars->toArray());
    	return view('car.index')->with('cars', $cars);
    }


    public function create () {
    	$mechanics = Mechanic::select('id', 'name')->get();
    	return view('car.create')->with('mechanics', $mechanics);
    }


    public function store (CarRequest $request) {
    	/*
		
		1. get file from request
		2. determine path
		3. determine name
		4. upload/move/put
		5. verify

    	*/


		$image = $request->file('image');

		$path = 'uploads/images/';

		// $name = $image->getClientOriginalName();
		// $name = 'image_file.png';
		$name = time()+rand(1, 10000000000) . '.' . $image->getClientOriginalExtension();

		Storage::disk('local')->put($path.$name , file_get_contents($image));

		$status = Storage::disk('local')->exists($path.$name);




		// store in DB

		$model = $request['model'];
		$mechanic_id = $request['mechanic_id'];

		$car = new Car();
		$car->model = $model;
		$car->mechanic_id = $mechanic_id;
		$car->image = $path.$name;
		$car->save();

		return redirect()->back();
    }
}
