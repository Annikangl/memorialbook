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
            'middle_name' => ['required', 'string', 'max:50'],
            'gender' => ['required', 'string', Rule::in(Human::genderList())],
            'date_birth' => ['required', 'date', 'date_format:d.m.Y'],
            'date_death' => ['required', 'date', 'date_format:d.m.Y'],
            'death_reason' => ['required', 'string'],
            'birth_place' => ['required', 'string', 'min:3'],
            'burial_place' => ['nullable', 'string', 'min:3'],

            'father_id' => ['nullable', 'integer'],
            'mother_id' => ['nullable', 'integer'],
            'spouse_id' => ['nullable', 'integer'],
            'description' => ['required', 'string'],
            'hobbies' => ['nullable', 'array'],
            'religion' => ['nullable', 'string'],
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
