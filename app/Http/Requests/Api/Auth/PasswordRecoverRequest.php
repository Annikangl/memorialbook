<?php

namespace App\Http\Requests\Api\Auth;

use App\Rules\EmailVerificationCode;
use App\Traits\JsonFailedResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class PasswordRecoverRequest extends FormRequest
{
    use JsonFailedResponse;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Password::default()],
            'password_confirmation' => ['required', 'string'],
            'verification_code' => ['required', 'integer',new EmailVerificationCode()],
        ];
    }


}
