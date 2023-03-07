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

    protected function prepareForValidation()
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
            'cemetery_address' => ['nullable', 'string', 'min:5'],
            'cemetery_address_coords' => [
                'nullable',
                'array:lat,lng'
            ],
            'email' => ['nullable', 'email:dns', 'unique:cemeteries', 'unique:users'],
            'phone' => ['nullable', 'string', 'min:8', 'max:15'],
            'schedule' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'settings-public' => Rule::in(Cemetery::getAccessList()),

            'avatar' => [
                'sometimes',
                File::image()->min(5)->max(10 * 1024),
            ],
            'input-banner' => [
                Rule::requiredIf(fn () => $this->hasFile('input-banner')),
                File::image()->min(5)->max(10 * 1024),
            ],
            'cemetery_gallery.*' => [
                Rule::requiredIf(fn () => is_array($this->get('cemetery_gallery'))),
                File::image()->min(10)->max(10 * 1024),
            ],
        ];
    }
}
