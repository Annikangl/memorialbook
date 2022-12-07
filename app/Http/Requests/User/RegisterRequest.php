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
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
<<<<<<< HEAD
            'phone' => ['required', 'string', 'max:15', 'unique:users,phone'],
=======
            'phone' => ['required', 'string', 'max:20', 'unique:users,phone'],
>>>>>>> master
            'password' => ['required', 'string', Password::default()],
            'password_confirmation' => ['required',' string', Password::default()],
            'device' => ['sometimes', 'string'],
        ];
    }
}
