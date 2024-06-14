<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3|max:255',
            'message' => 'required|string|min:3|max:4000',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'De titel is verplicht',
            'title.string' => 'De titel is ongeldig',
            'title.max' => 'De titel mag maar :max karakters lang zijn',
            'title.min' => 'De titel moet minstens :min karakters lang zijn',

            'message.required' => 'Het bericht is verplicht',
            'message.string' => 'Het bericht is ongeldig',
            'message.min' => 'Het bericht moet minstens :min karakters lang zijn',
            'message.max' => 'Het bericht mag maar :max karakters lang zijn',
        ];
    }
}
