<?php

namespace App\Http\Requests\Api\User;

use App\Traits\JsonFailedResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
{
    use JsonFailedResponse;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'username' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'email'],
            'password' => ['nullable', 'string', Password::default()],
            'password_confirmation' => ['nullable', 'string'],
            'avatar' => [
                'nullable',
                File::image()->min(1)->max(10 * 1024)
            ]
        ];
    }
}
