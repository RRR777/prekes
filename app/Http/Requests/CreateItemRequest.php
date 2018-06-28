<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateItemRequest extends FormRequest
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
            'name' => 'required|min:3',
            'quantity' => 'required|numeric|min:0',
            'price' => 'required|min:1|regex:/^\d*(\.\d{2})?$/',
            'category' => 'required',
        ];
    }

        public function messages()
    {
        return [
            'name.required' => 'Įveskite Prekės pavadinimą.',
            'name.min' => 'Prekės pavadinimas turi būti bent 3 simboliai.',
            'quantity.required' => 'Įveskite kiekį.',
            'quantity.numeric' => 'Kiekis turi būti įvestas skaičiumi.',
            'quantity.min' => 'Prekės kiekis negali būti mažiau už 0',
            'price.required' => 'Įveskite kainą.',
            'price.min' => 'Prekės kaina negali būti mažiau už 1',
            'price.regex' => 'Prekės kaina turi būti įvesta skaičiumi.
                Skaičiui po kablelio atskirti naudokite tašką',
            'category.required' => 'Pasirinkite Prekės kategoriją.'
        ];
    }
}
