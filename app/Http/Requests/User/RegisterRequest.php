<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'registration_full_name' => ['required', 'string', 'max:255'],
            'registration_email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'registration_phone' => ['required', 'string', 'max:20', 'unique:users,phone'],
            'registration_password' => ['required', 'string', Password::default()],
            'registration_password_confirm' => ['required',' string', Password::default()],
            'device' => ['sometimes', 'string'],
        ];
    }
}
