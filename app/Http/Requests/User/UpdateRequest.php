<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'username' => $this->first_name . ' ' . $this->last_name . ' ' . $this->patronymic,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email:dns']
        ];
    }
}
