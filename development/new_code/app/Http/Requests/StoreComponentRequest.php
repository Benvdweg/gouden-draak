<?php

namespace App\Http\Requests;

use App\Models\Component;
use Illuminate\Foundation\Http\FormRequest;

class StoreComponentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'type' => 'required|string|in:'.implode(',', array_keys((new Component)->childTypes)),
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Dit veld is verplicht.',
            'in' => 'Ongeldig type',
        ];
    }
}
