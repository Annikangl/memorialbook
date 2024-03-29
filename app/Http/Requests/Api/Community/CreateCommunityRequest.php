<?php

namespace App\Http\Requests\Api\Community;

use App\Rules\PhoneNumber;
use App\Traits\JsonFailedResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class CreateCommunityRequest extends FormRequest
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
            'email' => ['required', 'email', 'unique:communities'],
            'phone' => ['required', 'string', new PhoneNumber(), 'unique:communities'],
            'website' => ['nullable', 'string', 'url'],
            'social_links' => ['nullable', 'array'],
            'social_links.*' => ['nullable', 'url'],
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
        ];
    }
}
