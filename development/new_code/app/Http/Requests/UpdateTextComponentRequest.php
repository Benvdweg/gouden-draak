<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTextComponentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'content' => 'required|string|max:16383',
            'componentId' => 'required|integer|exists:components,id',
        ];
    }

    public function messages(): array
    {
        return [
            'content.required' => 'Het bericht kan niet leeg zijn',
            'content.max' => 'Dit bericht mag niet langer zijn dan 16,383 karakters.',
        ];
    }
}
