<?php

namespace App\Http\Requests\Cemetery;

use App\Models\Cemetery\Cemetery;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

/**
 * Class CreateRequest
 * @package App\Http\Requests\Cemetery
 *
 * @property string $cemetery_address_coords
 * @property string $cemetery_address
 */
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

    protected function prepareForValidation(): void
    {
        $this->merge([
            'cemetery_address_coords' => json_decode($this->cemetery_address_coords, true)
        ]);
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3'],
            'title_en' => ['nullable', 'string', 'min:3'],
            'subtitle' => ['nullable', 'string', 'min:3'],
            'cemetery_address' => ['required', 'nullable', 'string', 'min:5'],
            'cemetery_address_coords' => ['nullable', 'array:lat,lng'],
            'email' => ['nullable', 'email'],
            'phone' => ['nullable', 'string', 'min:8', 'max:15'],
            'schedule' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'settings-public' => ['required', Rule::in(Cemetery::getAccessList())],

            'avatar' => [
                'sometimes',
                File::image()->min(5),
            ],
            'cemetery_banner' => [
                'sometimes',
                File::image()->max(10 * 1024),
            ],
            'cemetery_files.*' => [
                'sometimes',
                File::types(['video/mp4', 'image/jpeg', 'image/png'])->max(30 * 1024),
            ],
        ];
    }
}
