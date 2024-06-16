<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditDishRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'menu_number' => 'nullable|integer',
            'addition' => 'nullable|string|max:10',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Naam van het gerecht is verplicht',
            'name.string' => 'Naam van het gerecht moet een tekst zijn',
            'name.max' => 'Naam van het gerecht mag niet langer zijn dan 255 tekens',

            'price.required' => 'Prijs van het gerecht is verplicht',
            'price.numeric' => 'Prijs van het gerecht moet een nummer zijn',
            'price.min' => 'Prijs van het gerecht mag niet negatief zijn',

            'description.string' => 'Beschrijving moet een tekst zijn',

            'menu_number.integer' => 'Menu nummer moet een geheel getal zijn',

            'addition.max' => 'Toevoeging mag niet langer zijn dan 10 tekens',
        ];
    }
}
