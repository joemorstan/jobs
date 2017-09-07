<?php

namespace App\Http\Requests;

use Sentinel;
use Illuminate\Foundation\Http\FormRequest;

class StoreNewVacancy extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (!Sentinel::check() and !Sentinel::inRole('employer')) {
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
            'company' => 'required|max:50',
            'title' => 'required|min:2|max:50',
            'description' => 'required|max:500',
            'salary' => 'digits_between:0,10',
        ];
    }
}
