<?php

namespace App\Http\Requests\Api\Community;

use App\Rules\PhoneNumber;
use App\Traits\JsonFailedResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class UpdateCommunityRequest extends FormRequest
{
    use JsonFailedResponse;

    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:150'],
            'subtitle' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
            'address' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string', new PhoneNumber()],
            'website' => ['nullable', 'nullable', 'url'],
            'social_Links' => ['nullable', 'array'],
            'social_Links.*' => ['nullable', 'url'],
            '_method' => ['required', 'string'],
            'avatar' => [
                'nullable',
                File::image()->max(10 * 1024),
            ],
            'banner' => [
                'nullable',
                File::image()->max(10 * 1024),
            ],
            'gallery.*' => [
                'nullable',
                File::types(['video/mp4', 'image/jpeg', 'image/png'])
                    ->max(30 * 1024),
            ],
            'media_removed_ids' => ['nullable', 'array']
        ];
    }
}
