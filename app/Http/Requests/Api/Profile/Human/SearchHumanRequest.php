<?php

namespace App\Http\Requests\Api\Profile\Human;

use App\Traits\JsonFailedResponse;
use Illuminate\Foundation\Http\FormRequest;

class SearchHumanRequest extends FormRequest
{
    use JsonFailedResponse;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'min:3', 'max:255'],
            'birth_year' => ['nullable', 'string', 'regex:(\d{4}-\d{4})'],
            'death_year' => ['nullable', 'string', 'regex:(\d{4}-\d{4})'],
            'country' => ['nullable', 'string'],
        ];
    }
}
