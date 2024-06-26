<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email is verplicht',
            'email.email' => 'Voer een geldige email in',

            'password.required' => 'Wachtwoord is verplicht',
        ];
    }
}
