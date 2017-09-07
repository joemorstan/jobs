<?php

namespace App\Http\Requests;

use Sentinel;
use Illuminate\Foundation\Http\FormRequest;

class StoreNewUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Sentinel::check()) {
            return false;
        }

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
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'role' => 'required|numeric|between:2,3',
            'email' => 'bail|required|email|unique:users',
            'password' => 'bail|required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'role.between' => 'Please, select a valid role',
        ];
    }
}
