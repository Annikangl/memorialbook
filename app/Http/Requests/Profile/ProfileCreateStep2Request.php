<?php


namespace App\Http\Requests\Profile;


use Illuminate\Foundation\Http\FormRequest;

class ProfileCreateStep2Request extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'hobby_id' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'hobby_id.required' => 'Пожалуйста выберите хотябы одно увлечение',
        ];
    }

}
