<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignTableRequest extends FormRequest
{
    public function rules()
    {
        return [
            'table_number' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'table_number.required' => 'Dit veld is verplicht',
            'table_number.integer' => 'De ingevoerde waarde is een ongeldig tafelnummer',
        ];
    }
}
