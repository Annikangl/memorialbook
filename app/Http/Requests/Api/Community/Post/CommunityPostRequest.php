<?php

namespace App\Http\Requests\Api\Community\Post;

use App\Traits\JsonFailedResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

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
            'is_pinned' => ['required', 'bool'],
            'published_at' => ['nullable', 'date', 'date_format:Y-m-d H:i:s'],
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'post_media' => ['nullable', 'array'],
            'post_media.*' => [
                'nullable',
                File::types(['image/jpeg', 'image/png', 'image/webp', 'image/gif','video/mp4', 'video/avi', 'video/mpeg'])
                    ->max(15 * 1024)
            ],
        ];
    }
}
