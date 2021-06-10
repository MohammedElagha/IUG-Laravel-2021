<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Mechanic;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CarRequest;
use App\Http\Traits\CarPriceComputeTrait;
use App;

class CarController extends Controller
{ 

    use CarPriceComputeTrait;

    public function index (Request $request) {
    	// if ($request->headers->has('Lang')) {
    	// 	$cars = Car::with('owner')->with('mechanic')->select('*')->get();

	    // 	foreach ($cars as $car) {
	    // 		$img_link = Storage::url($car->image);
	    // 		$car->image = $img_link;
	    // 	}

	    // 	return view('car.index')->with('cars', $cars);
    	// } else {
    	// 	return view('errors.missing');
    	// }

    	

    	// dd($cars->toArray());


    	// session(['user_id' => 15 , 'user_name' => 'Mohammed']);
    	// Session::put('user_id', 15);



    	// dd(Auth::user());
    	// dd(Auth::user()->name);

        // $CarPriceComputeController = new CarPriceComputeController;

        App::setLocale('en');


        $cars = Car::with('owner')->with('mechanic')->select('*')->get();

        foreach ($cars as $car) {
            $img_link = Storage::url($car->image);
            $car->image = $img_link;


            $price_after_discount = $this->compute_car_price_after_discount($car);
            $price_after_tax = $this->compute_car_price_after_tax($car, $price_after_discount);

            $car->final_price = $price_after_tax;
        }




    	return view('car.index')->with('cars', $cars);
    }


    public function create () {
        App::setLocale('ar');

    	$mechanics = Mechanic::select('id', 'name')->get();

    	// $user_id = session('user_id');

    	return view('car.create')->with('mechanics', $mechanics);
    	/*->with('user_id', $user_id)*/
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
		$result = $car->save();

		return redirect()->back()->with('add_status', $result);
    }
}
