<?php

namespace App\Http\Requests\Api\Profile\Human;

use App\Models\Profile\Human\Human;
use App\Models\Profile\Profile;
use App\Traits\JsonFailedResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class CreateHumanRequest extends FormRequest
{
    use JsonFailedResponse;

    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'middle_name' => ['nullable', 'string', 'max:50'],
            'gender' => ['required', 'string', Rule::in(Human::genderList())],
            'date_birth' => ['required', 'date', 'date_format:d.m.Y'],
            'date_death' => ['required', 'date', 'date_format:d.m.Y'],
            'death_reason' => ['nullable', 'string', 'max:150'],
            'birth_place' => ['required', 'string', 'min:3'],
            'burial_place' => ['nullable', 'string', 'min:3'],
            'father_id' => ['nullable', 'exists:humans,id'],
            'mother_id' => ['nullable', 'exists:humans,id'],
            'spouse_id' => ['nullable', 'exists:humans,id'],
            'religion_id' => ['nullable', 'exists:religions,id'],
            'description' => ['required', 'string','max:5000'],
            'hobbies' => ['nullable', 'array'],
            'as_draft' => ['required', 'bool'],
            'access' => ['required', Rule::in(Profile::getAccessList())],
            'burial_coords' => [
                'required_with:burial_place',
                'nullable',
                'array:lat,lng'
            ],
            'avatar' => [
                'nullable',
                File::image()
                    ->min(10)
                    ->max(5 * 1024)
            ],
            'banner' => [
                'sometimes',
                File::image()
                    ->max(5 * 1024)
            ],
            'gallery' => ['nullable', 'array'],
            'gallery.*' => ['nullable', 'mimes:jpg,jpeg,png,webp,mp4', 'max:20000'],
            'death_certificate' => [
                'nullable',
                File::types(['pdf'])
                    ->max(10 * 1024)
            ],
        ];
    }
}
