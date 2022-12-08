<?php

namespace App\Http\Requests\User;

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
            'login_password' => ['required',Password::default()],
            'device' => ['required', 'string', 'min:5', 'max:255']
        ];
    }
}
