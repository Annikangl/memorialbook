<?php

namespace App\Http\Requests\Api\Auth;

use App\Traits\JsonFailedResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    use JsonFailedResponse;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => ['required', 'string', 'min:3', 'max:50'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string', Password::default(), 'confirmed'],
            'password_confirmation' => ['required', 'string'],
            'device_name' => ['required', 'string'],
            'fcm_token' => ['required', 'string'],
            'location' => ['required', 'string', 'max:15']
        ];
    }
}
