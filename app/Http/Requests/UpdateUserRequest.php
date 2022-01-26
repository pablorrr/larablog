<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => [
                'required',
                'max:16',
            ],

            'email' => [
                'required',
                'max:1000',
            ],

            'role' => [
                'required',
            ],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nazwisko',
            'email' => 'email',
            'role' => 'uprawnienia',
        ];
    }

}
