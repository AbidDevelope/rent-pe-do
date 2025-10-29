<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $userId = auth()->user()->id;
        return [
            'first_name' => 'required|string',
            'last_name' => 'nullable|string',
            'contact' => ['required','numeric',"unique:users,phone,$userId,id"],
            'additional_contact' => 'nullable|numeric',
            'email' => ['nullable','email',"unique:users,email,$userId,id"]
        ];
    }
}
