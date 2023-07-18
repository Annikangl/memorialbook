<?php

namespace App\Http\Requests\Api\Auth;

use App\Traits\JsonFailedResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class LoginRequest extends FormRequest
{
    use JsonFailedResponse;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'string', Password::default()],
            'device_name' => ['required', 'string'],
            'fcm_token' => ['required', 'string'],
        ];
    }
}
