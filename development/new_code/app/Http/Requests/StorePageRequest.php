<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => [
                'required',
                'string',
                'max:255',
                'unique:pages,slug',
                'regex:/^[a-zA-Z0-9]+(?:[-_][a-zA-Z0-9]+)*$/u',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Het titel veld is verplicht.',
            'title.string' => 'Het titel veld moet een tekst zijn.',
            'title.max' => 'Het titel veld mag niet meer dan :max karakters bevatten.',

            'slug.required' => 'Het url veld is verplicht.',
            'slug.string' => 'Het url veld moet een tekst zijn.',
            'slug.max' => 'Het url veld mag niet meer dan :max karakters bevatten.',
            'slug.unique' => 'Deze url is al in gebruik, kies een andere.',
            'slug.regex' => 'Het URL veld mag alleen alfanumerieke karakters bevatten en mag niet beginnen of eindigen met een streepje (-) of underscore (_).',
        ];
    }
}
