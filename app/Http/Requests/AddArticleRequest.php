<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddArticleRequest extends FormRequest
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
            'author-name' => ['required', 'max:32'],

            'title' => ['required', 'max:32'],
            'content' => ['required', 'max:1000']

        ];
    }

    public function attributes()
    {
        return [
            'author-name' => 'Nazwisko autora',

            'title' => 'tytuł',
            'content' => 'treśc'
        ];
    }
}
