<?php

namespace App\Http\Requests\Profile\Pet;

use App\Models\Profile\DeathReason;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

/**
 * @property string $burial_coords
 */
class CreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return \Auth::check();
    }

    protected function prepareForValidation()
    {
        if ($this->get('burialCoords')) {
            $this->merge([
                'burialCoords' => json_decode($this->get('burialCoords'), true)
            ]);
        }
    }

    protected function failedValidation(Validator $validator)
    {
        return redirect()->back()->with([
            'message' => $validator->errors()->first(),
            'alert-class' => 'alert-danger'
        ]);
    }


    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'breed' => ['required', 'string'],
            'dateBirth' => ['required', 'date'],
            'dateDeath' => ['required', 'date'],
            'birthPlace' => [ 'nullable', 'string'],
            'burialPlace' => ['nullable', 'string'],
            'burialCoords' => ['nullable', 'array'],
            'burialCoords.lat' => ['nullable', 'numeric'],
            'burialCoords.lng' => ['nullable', 'numeric'],
            'deathReason' => ['required', 'string'],
            'description' => ['nullable', 'string'],

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
