<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDishRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0|regex:/^\d{1,8}(\.\d{1,2})?$/',
            'description' => 'nullable|string|max:1000',
            'type' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Naam van het gerecht is verplicht',
            'name.string' => 'Naam van het gerecht moet een geldige tekst zijn',
            'name.max' => 'Naam van het gerecht mag niet langer zijn dan :max tekens',

            'price.required' => 'Prijs van het gerecht is verplicht',
            'price.numeric' => 'Prijs van het gerecht moet een geldig nummer zijn',
            'price.min' => 'Prijs van het gerecht mag niet negatief zijn',
            'price.regex' => 'Prijs van het gerecht moet een geldig bedrag zijn (maximaal twee decimalen)',

            'description.string' => 'Beschrijving moet een tekst zijn',
            'description.max' => 'Beschrijving mag niet langer zijn dan :max tekens',

            'type.required' => 'Type van het gerecht is verplicht',
            'type.string' => 'Type van het gerecht moet een tekst zijn',
            'type.max' => 'Type van het gerecht mag niet langer zijn dan :max tekens',
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'price' => str_replace(',', '.', $this->price),
        ]);
    }
}
