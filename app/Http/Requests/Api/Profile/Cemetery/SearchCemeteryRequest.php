<?php

namespace App\Http\Requests\Api\Profile\Cemetery;

use App\Traits\JsonFailedResponse;
use Illuminate\Foundation\Http\FormRequest;

class SearchCemeteryRequest extends FormRequest
{
    use JsonFailedResponse;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:1', 'max:255'],
        ];
    }
}
