<?php

namespace App\Http\Requests\Profile\Human;

use App\Models\Profile\Human\Human;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

/**
 * @property array $removedImageIds;
 * @property string $burial_coords
 */
class UpdateHumanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    protected function failedValidation(Validator $validator)
    {
        return redirect()->back()->with([
            'message' => $validator->errors()->first(),
            'alert-class' => 'alert-danger',
        ]);
    }

    protected function prepareForValidation(): void
    {
        if ($this->burial_coords) {
            $this->merge([
                'burial_coords' => json_decode($this->burial_coords, true),
            ]);
        }

        if ($this->removedImageIds) {
            $this->merge([
                'removedImageIds' => array_filter($this->removedImageIds, static function($var) {
                    return $var !== null;
                })
            ]);
        }

    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'min:3'],
            'last_name' => ['required', 'string', 'min:3'],
            'gender' => ['required', 'string', Rule::in(array_values(Human::genderList()))],
            'date_birth' => ['required', 'date'],
            'birth_place' => ['nullable', 'string'],
            'burial_place' => ['nullable', 'string'],
            'death_reason' => ['nullable', 'string'],
            'date_death' => ['required', 'date'],
            'father_id' => ['sometimes', 'integer'],
            'mother_id' => ['sometimes', 'integer'],
            'spouse_id' => ['sometimes', 'integer'],
            'gallery.*' => ['required', 'mimes:jpg,jpeg,png,webp,mp4', 'max:20000'],
            'description' => ['nullable', 'string'],
            'religion_id' => ['nullable', 'integer'],
            'access' => ['required', Rule::in(Human::getAccessList())],

            'burial_coords' => [
                'required_with:burial_place',
                'nullable',
                'array:lat,lng'
            ],

            'avatar' => [
                'nullable',
                File::image()
                    ->min(1)
                    ->max(5 * 1024)
            ],

            'death_certificate' => [
                'nullable',
                File::types(['pdf'])
                    ->max(10 * 1024)
            ],

            'removedImageIds' => ['nullable', 'array'],
        ];
    }
}
