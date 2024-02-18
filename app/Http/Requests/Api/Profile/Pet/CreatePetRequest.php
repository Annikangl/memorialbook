<?php

namespace App\Http\Requests\Api\Profile\Pet;

use App\Models\Profile\Profile;
use App\Traits\JsonFailedResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class CreatePetRequest extends FormRequest
{
    use JsonFailedResponse;

    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'breed' => ['required', 'string', 'max:50'],
            'date_birth' => ['required', 'date', 'date_format:d.m.Y'],
            'date_death' => ['required', 'date', 'date_format:d.m.Y'],
            'birth_place' => [ 'nullable', 'string'],
            'burial_place' => ['nullable', 'string'],
            'death_reason' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'owner_id' => ['required', 'integer', 'exists:humans,id'],
            'as_draft' => ['required', 'bool'],
            'is_celebrity' => ['nullable', 'bool'],
            'access' => ['required', Rule::in(Profile::getAccessList())],

            'avatar' => [
                'sometimes',
                File::image()
                    ->max(10 * 1024)
            ],

            'banner' => [
                'sometimes',
                File::image()
                    ->max(10 * 1024),
            ],

            'gallery.*' => [
                'sometimes',
                File::types(['video/mp4', 'image/jpeg', 'image/png'])->max(30 * 1024),
            ],
        ];
    }


}
