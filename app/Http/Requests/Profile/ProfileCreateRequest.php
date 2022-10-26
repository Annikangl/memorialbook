<?php


namespace App\Http\Requests\Profile;


use Illuminate\Foundation\Http\FormRequest;

class ProfileCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required',
            'patronymic' => 'required',
            'last_name' => 'required',
            'date_birth' => 'required',
            'birth_place' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'first_name.required' => 'Укажите имя профиля',
            'patronymic.required' => 'Укажите отчество профиля',
            'last_name.required' => 'Укажите фамилию профиля',
            'date_birth.required' => 'Укажите дату рождения',
            'birth_place.required' => 'Укажите место рождения',
        ];
    }

}
