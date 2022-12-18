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
           'avatar' => $this->file('avatar')
        ]);
    }


    public function rules(): array
    {

//        TODO email validate
        return [
            'full_name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email:dns'],
            'phone' => ['sometimes', 'nullable', 'string', 'min:8', 'max:20'],
            'avatar' => ['nullable',
                Rule::requiredIf(function () {
                    $this->hasFile('avatar');
                }),
                File::image()->min(1)->max(5 * 1024)
                    ->dimensions(Rule::dimensions()->minWidth(100)->minHeight(100)),
            ]
        ];
    }
}
