<?php

namespace App\Http\Requests\Api\Community\Post;

use App\Traits\JsonFailedResponse;
use Illuminate\Foundation\Http\FormRequest;

class CommunityPostRequest extends FormRequest
{
    use JsonFailedResponse;

    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'community_id' => ['required', 'exists:communities,id'],
            'content_type' => ['required', 'string'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'is_pinned' => ['required', 'bool'],

        ];
    }
}
