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
                Rule::requiredIf(function () {
                    $this->hasFile('avatar');
                }),
                File::image()
                    ->min(10)
                    ->max(5 * 1024)
            ],
            'title' => ['required', 'string', 'min:3','max:100'],
            'community_address' => ['required', 'string'],
            'community_address_coords' => [
                Rule::requiredIf((bool)$this->get('community_address_coords')),
                'nullable',
                'array:lat,lng'
            ],
            'email' => ['sometimes', 'nullable', 'email:dns', 'unique:communities'],
            'phone' => ['sometimes', 'nullable', 'string', 'min:10', 'max:15', 'unique:communities'],
            'website' => ['sometimes', 'nullable', 'string'],
            'community_banner' => [
                Rule::requiredIf(fn () => $this->hasFile('input-banner')),
                File::image()->min(50)->max(10 * 1024),
            ],
            'community_gallery.*' => [
                Rule::requiredIf(fn () => is_array($this->get('community-gallery.*'))),
                File::image()->min(10)->max(10 * 1024),
            ],
            'community_documents.*' => [
                Rule::requiredIf(fn () => is_array($this->get('community_documents.*'))),
                File::types('pdf')
                    ->min(5)
                    ->max(10 * 1024)
                ],
            'description' => ['sometimes', 'nullable', 'string']
        ];
    }
}
