<?php


namespace App\Http\Requests\Profile;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class ProfileCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return \Auth::check();
    }

    public function rules(): array
    {
        return [
            'avatar' => [
                Rule::requiredIf(function () {
                    $this->hasFile('avatar');
                }),
//                File::image()
//                ->min(100)
//                ->max(5 * 1024)
//                ->dimensions(Rule::dimensions()->maxWidth(1920)->maxHeight(1080))
            ],
            'first_name' => ['required', 'string', 'min:3'],
            'last_name' => ['required', 'string', 'min:3'],
            'date_birth' => ['required', 'string', 'min:3'],
            'birth_place' => ['required', 'string', 'min:3'],
            'date_death' => ['required']
        ];
    }

    public function messages(): array
    {
        return [
            'avatar' => 'Изображение аватара должно быть не меньше 100 кб и не более 5 мб',
            'first_name.required' => 'Укажите Имя',
            'last_name.required' => 'Укажите Фамилию',
            'date_birth.required' => 'Укажите дату рождения',
            'birth_place.required' => 'Укажите место рождения',
            'date_death.required' => 'Укажите дату смерти',
        ];
    }

}
