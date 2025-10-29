<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdsRequest extends FormRequest
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
        $thumbnai = 'required';
        // if ($this->isMethod('POST')) {
        //     $thumbnai = 'nullable';
        // }
        return [
            'title' => 'required|string|max:255',
            'thumbnail' => "$thumbnai|image|mimes:png,jpg,jpeg,gif,svg|max:2048",
            'area_distance' => 'nullable|numeric|min:0',
            'description' => 'nullable|string',
        ];
    }
}
