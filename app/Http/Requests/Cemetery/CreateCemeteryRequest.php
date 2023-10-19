<?php

namespace App\Http\Requests\Cemetery;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

/**
 * Class CreateCemeteryRequest
 * @package App\Http\Requests\Cemetery
 *
 * @property string $cemetery_address_coords
 * @property string $cemetery_address
 */
class CreateCemeteryRequest extends FormRequest
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
        if ($this->get('address')) {
            $this->merge([
                'addressCoords' => json_decode($this->get('addressCoords'), true)
            ]);
        }
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3'],
            'titleEn' => ['nullable', 'string', ''],
            'subtitle' => ['nullable', 'string', 'min:3'],
            'address' => ['required', 'string', 'min:5'],
            'addressCoords' => ['nullable', 'required_with:address', 'array:lat,lng'],
            'email' => ['nullable', 'email'],
            'phone' => ['nullable', 'string', 'min:8', 'max:15'],
            'schedule' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'access' => ['required', Rule::in(\App\Models\Profile\Cemetery\Cemetery::getAccessList())],

            'draft' => ['sometimes', 'string'],

            'avatar' => [
                'nullable',
                File::image()->min(5),
            ],

            'banner' => [
                'nullable',
                File::image()->max(10 * 1024),
            ],

            'gallery.*' => [
                'sometimes',
                File::types(['video/mp4', 'image/jpeg', 'image/png'])
                    ->max(30 * 1024),
            ],
        ];
    }
}
