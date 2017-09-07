<?php

namespace App\Http\Requests;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Foundation\Http\FormRequest;

class StoreResumeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (!Sentinel::check() and !Sentinel::inRole('client')) {
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
            'title' => 'required|min:1|max:50',
            'description' => 'required|max:500',
            'salary' => 'digits_between:0,10',
        ];
    }

    public function messages()
    {
        return [
            'salary.digits_between' => 'Salary must be a valid numeric value',
        ];
    }
}
