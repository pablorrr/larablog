<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'user-name' => ['required', 'max:32'],

            'email' => ['required', 'max:32'],
            'role' => ['required']

        ];
    }

    public function attributes()
    {
        return [
            'user-name' => 'Nazwa usera',

            'email' => 'email',
            'role' => 'uprawnienia'
        ];
    }
}
