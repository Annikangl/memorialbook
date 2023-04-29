<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'login_email' => ['required', 'email:dns'],
            'login_password' => ['required', Password::default()],
            'device' => ['sometimes', 'string', 'min:2', 'max:255']
        ];
    }
}
