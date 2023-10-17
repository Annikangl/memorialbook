<?php

namespace App\Http\Requests\Api\Community;

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
            'email' => ['required', 'email', 'unique:cemeteries'],
            'phone' => ['required', 'string', 'min:8', 'max:15', 'unique:communities'],
            'website' => ['sometimes', 'nullable', 'url'],
            'avatar' => [
                'nullable',
                File::image()->max(10 * 1024),
            ],

            'banner' => [
                'nullable',
                File::image()->max(10 * 1024),
            ],

            'gallery.*' => [
                'sometimes',
                File::types(['video/mp4', 'image/jpeg', 'image/png'])
                    ->max(30 * 1024),
            ],
        ];
    }
}
