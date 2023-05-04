<?php

namespace App\Http\Requests\Profile\Burial;

use Illuminate\Foundation\Http\FormRequest;

class CreateBurialRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'profile_ids' => ['required', 'array'],
            'profile_ids.*' => ['required', 'string', 'exists:humans,slug']
        ];
    }
}
