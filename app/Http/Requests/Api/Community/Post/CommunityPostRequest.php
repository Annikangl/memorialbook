<?php

namespace App\Http\Requests\Api\Community\Post;

use App\Models\Community\Posts\Post;
use App\Traits\JsonFailedResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
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
            'community_id' => ['required', 'integer', 'exists:communities,id'],
            'content_type' => ['required', Rule::in(Post::getContentTypes())],
            'is_pinned' => ['nullable', 'int'],
            'published_at' => ['nullable', 'date', 'date_format:Y-m-d H:i:s'],
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5000'],
            'post_media' => ['nullable', 'array', 'required_if:content_type,MEDIA_POST|TEXT_WITH_MEDIA_POST'],
            'post_media.*' => [
                'nullable',
                File::types(['image/jpeg', 'image/png', 'image/webp', 'image/gif', 'video/mp4', 'video/avi', 'video/mpeg'])
                    ->max(15 * 1024)
            ],
            'post_media_removed_ids' => ['nullable', 'array', 'required_with::post_media'],
        ];
    }
}
