<?php

namespace App\Http\Controllers\API\Car;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\CarPriceComputeTrait;
use App\Car;
use Storage;
use App\Http\Requests\CarRequest;

class CarController extends Controller
{
    use CarPriceComputeTrait;
    //

    public function index (Request $request) {

        $cars = Car::with('owner')->with('mechanic')->select('*')->get();

        foreach ($cars as $car) {
            $img_link = Storage::url($car->image);
            $car->image = $img_link;


            $price_after_discount = $this->compute_car_price_after_discount($car);
            $price_after_tax = $this->compute_car_price_after_tax($car, $price_after_discount);

            $car->final_price = $price_after_tax;
        }

        return response()->json($cars);
    }


    public function store (CarRequest $request) {
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

		if ($result) {
			$status = true;
		} else {
			$status = false;
		}

		return response()->json(['status' => $status]);
    }
}
