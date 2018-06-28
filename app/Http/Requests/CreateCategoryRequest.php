<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            'name' => 'required|min:3|unique:categories',
        ];
    }

        public function messages()
    {
        return [
            'name.required' => 'Įveskite Prekės kategoriją.',
            'name.min' => 'Prekės kategorijos pavadinimas turi būti bent 3 simboliai.',
            'name.unique' => 'Tokia kategorija jau yra.'
        ];
    }
}
