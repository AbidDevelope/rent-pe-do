<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'first_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'contact' => 'required|numeric|unique:users,phone',
            'email' => 'nullable|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png,svg'
        ];
    }
}
