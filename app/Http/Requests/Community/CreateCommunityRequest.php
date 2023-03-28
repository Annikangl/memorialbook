<?php

namespace App\Http\Requests\Community;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

/**
 * Class CreateCommunityRequest
 * @package App\Http\Requests\Community
 *
 * @property string $community_address_coords
 */
class CreateCommunityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    protected function failedValidation(Validator $validator)
    {
        return redirect()->back()->with([
            'message' => $validator->errors()->first(),
            'alert-class' => 'alert-danger'
        ]);
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'community_address_coords' => json_decode($this->community_address_coords, true),
        ]);
    }

    public function rules(): array
    {
        return [
            'avatar' => [
                'sometimes',
                File::image()
                    ->min(1)
                    ->max(5 * 1024)
            ],
            'title' => ['required', 'string', 'min:3', 'max:100'],
            'community_address' => ['required', 'string'],
            'community_address_coords' => [
                Rule::requiredIf((bool)$this->get('community_address_coords')),
                'nullable',
                'array:lat,lng'
            ],
            'email' => ['sometimes', 'nullable', 'email:dns', 'unique:communities'],
            'phone' => ['sometimes', 'nullable', 'string', 'min:10', 'max:15', 'unique:communities'],
            'website' => ['sometimes', 'nullable', 'url'],
            'community_banner' => [
                'sometimes',
                File::image()->max(10 * 1024),
            ],
            'community_files.*' => [
                'sometimes',
                File::types(['video/mp4', 'image/jpeg', 'image/png'])->max(30 * 1024),
            ],
            'community_documents.*' => [
                'sometimes',
                File::types('application/pdf')
                    ->max(10 * 1024)
            ],
            'description' => ['sometimes', 'nullable', 'string', 'min:20']
        ];
    }
}
