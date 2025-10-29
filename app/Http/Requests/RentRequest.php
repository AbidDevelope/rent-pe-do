<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RentRequest extends FormRequest
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
             'title' => 'required|string|max:200',
             'description' => 'required|string',
             'type' => 'required|string',
             'washroom' => 'required|numeric',
             'balcony' => 'required|numeric',
             'position' => 'required|string',
             'bad' => 'required|numeric',

             'available_from' => 'required|date',
             'city' => 'nullable|exists:cities,id',
             'area' => 'nullable|exists:areas,id',
             'address' => 'required|string|max:160',

             'rent_price' => 'required|numeric',
             'electric_bill' => 'nullable',
             'water_bill' => 'nullable',
             'gas_bill' => 'nullable',
             'service_bill' => 'nullable',
             'negotiable' => 'nullable|boolean',
             'others_bill' => 'nullable',

             'male_student' => 'nullable|boolean',
             'female_student' => 'nullable|boolean',
             'man_job' => 'nullable|boolean',
             'women_job' => 'nullable|boolean',
             'any' => 'nullable|boolean',

             'lift' => 'nullable|boolean',
             'generator' => 'nullable|boolean',
             'guard' => 'nullable|boolean',
             'parking' => 'nullable|boolean',
             'gas' => 'nullable|boolean',
             'internet' => 'nullable|boolean',

             'islam' => 'nullable|boolean',
             'hindu' => 'nullable|boolean',
             'christian' => 'nullable|boolean',
             'bouddho' => 'nullable|boolean',
             'any_religion' => 'nullable|boolean',

             'feature_image1' => 'nullable|image|mimes:jpg,jpeg,png,svg,gif',
             'feature_image2' => 'nullable|image|mimes:jpg,jpeg,png,svg,gif',
             'feature_image3' => 'nullable|image|mimes:jpg,jpeg,png,svg,gif',
             'feature_image4' => 'nullable|image|mimes:jpg,jpeg,png,svg,gif',
             'feature_image5' => 'nullable|image|mimes:jpg,jpeg,png,svg,gif',

             'latitude' => 'required|numeric',
             'longitude' => 'required|numeric',
        ];
    }
}