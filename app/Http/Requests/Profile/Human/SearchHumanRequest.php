<?php

namespace App\Http\Requests\Profile\Human;

use Illuminate\Foundation\Http\FormRequest;

class SearchHumanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3'],
            'birthYear' => ['nullable', 'date_format:Y'],
            'deathYear' => ['nullable', 'date_format:Y'],
        ];
    }
}
