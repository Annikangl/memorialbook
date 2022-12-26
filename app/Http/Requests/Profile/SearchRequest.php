<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'min:3'],
            'birth_date' => ['sometimes', 'string'],
            'death_date' => ['sometimes', 'string'],
        ];
    }
}
