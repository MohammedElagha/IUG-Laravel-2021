<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'model' => 'required|string',
            'mechanic_id' => 'required|numeric|min:1',
            'image' => 'required'
        ];
    }



    public function messages () {
        return [
            'model.required' => 'Model is required',
            'model.string' => 'Model must be a string',
            'mechanic_id.required' => 'You must choose a mechanic',
            'mechanic_id.numeric' => 'The field of mechanic_id is a number',
            'mechanic_id.min:1' => 'Wrong value for mechanic_id selected',
            'image.required' => 'You must send an image',
        ];
    }
}
