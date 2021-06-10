<?php

namespace App\Http\Traits;

trait CarPriceComputeTrait {
	
	public function compute_car_price_after_discount ($car) {
    	$discount_value = ($car->discount_percent / 100) * $car->price;
        $price_after_discount = $car->price - $discount_value;
        return $price_after_discount;
    }


    public function compute_car_price_after_tax ($car, $price_after_discount) {
    	$tax_value = ($car->tax_percent / 100) * $price_after_discount;
        $price_after_tax = $car->price - $tax_value;
        return $price_after_tax;
    }
}