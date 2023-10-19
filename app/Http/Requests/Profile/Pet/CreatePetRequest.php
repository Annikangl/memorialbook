<?php

namespace App\Http\Requests\Profile\Pet;

use App\Models\Profile\Profile;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

/**
 * @property string $burial_coords
 */
class CreatePetRequest extends FormRequest
{
    public function authorize(): bool
    {
        return \Auth::check();
    }

    protected function prepareForValidation(): void
    {
        if ($this->get('burial_coords')) {
            $this->merge([
                'burial_coords' => json_decode($this->burial_coords, true),
            ]);
        }
    }

    protected function failedValidation(Validator $validator)
    {
        if ($this->expectsJson()) {
            throw new HttpResponseException(
                response()->json(["status" => false, "message" => $this->validator->errors()->first()],
                    422));
        } else {
            return redirect()->back()->with([
                'message' => $validator->errors()->first(),
                'alert-class' => 'alert-danger',
            ]);
        }
    }


    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'breed' => ['required', 'string'],
            'date_birth' => ['required', 'date'],
            'date_death' => ['required', 'date'],
            'birth_place' => [ 'nullable', 'string'],
            'burial_place' => ['nullable', 'string'],
            'death_reason' => ['required', 'string'],
            'burial_coords' => [
                'required_with:burial_place',
                'nullable',
                'array:lat,lng'
            ],
            'burial_coords.lat' => ['nullable', 'numeric'],
            'burial_coords.lng' => ['nullable', 'numeric'],
            'description' => ['nullable', 'string'],
            'owner_id' => ['required', 'integer', 'exists:humans,id'],
            'as_draft' => ['required', 'boolean'],
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
