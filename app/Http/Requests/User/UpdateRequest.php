<?php

namespace App\Http\Requests\User;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class UpdateRequest extends FormRequest
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
            'username' => $this->first_name . ' ' . $this->last_name . ' ' . $this->patronymic,
        ]);
    }

    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email:dns'],
            'phone' => [
                Rule::requiredIf(function () {
                    $this->get('phone');
                })
            ],
            'avatar' => [
                Rule::requiredIf(function () {
                    $this->hasFile('avatar');
                }),
                File::image()
                    ->min(10)->max(5 * 1024)
            ]
        ];
    }
}
