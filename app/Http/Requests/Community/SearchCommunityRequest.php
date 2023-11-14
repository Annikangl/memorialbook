<?php

namespace App\Http\Requests\Community;

use App\Traits\JsonFailedResponse;
use Illuminate\Foundation\Http\FormRequest;

class SearchCommunityRequest extends FormRequest
{
    use JsonFailedResponse;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:100'],
        ];
    }
}
