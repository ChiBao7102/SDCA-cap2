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
            'name' => 'required|string',
            'model' => 'required|string',
            'license_plates' => 'required|string',
            'price' => 'required|numeric|min:10',
            'carrier_pep' => 'required|numeric|min:1',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => __('message.car.namerequired'),
            'model.required' => __('message.car.modelrequired'),
            'license_plates.required' => __('message.car.licenserequired'),
            'price.required' => __('message.car.pricerequired'),
            'carrier_pep.required' => __('message.car.peprequired'),
        ];
    }
}
