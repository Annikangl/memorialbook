<?php

namespace App\Http\Requests\Profile\Pet;

use App\Models\Profile\DeathReason;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class CreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return \Auth::check();
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
            'date_birth' => ['required', 'date'],
            'date_death' => ['required', 'date'],
            'birth_place' => ['sometimes', 'nullable', 'string', 'min:3'],
            'burial_place' => ['sometimes', 'nullable', 'string', 'min:3'],
            'death_reason' => ['required', 'exists:death_reasons,title'],
            'description' => ['sometimes', 'nullable', 'string', 'min:20'],

            'avatar' => [
                'sometimes',
                File::image()
                    ->max(10 * 1024)
            ],

            'pet_banner' => [
                'sometimes',
                File::image()->max(10 * 1024),
            ],

            'pets_files.*' => ['sometimes',
                File::types(['video/mp4', 'image/jpeg', 'image/png'])->max(30 * 1024),
            ],
        ];
    }
}
