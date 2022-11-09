<?php


namespace App\Http\Requests\Profile;


use Carbon\Carbon;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

/**
 * Class ProfileCreateRequest
 * @package App\Http\Requests\Profile
 *
 * @property string $date_birth
 * @property string $date_death
 * @property string $burial_place_coords
 * @property string $father_id
 * @property string $spouse_id
 * @property string $mother_id
 * @property string $religious_id
 */
class ProfileCreateRequest extends FormRequest
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
            'date_birth' => Carbon::parse($this->date_birth)->format('Y-m-d'),
            'date_death' => Carbon::parse($this->date_death)->format('Y-m-d'),
            'burial_place_coords' => json_decode($this->burial_place_coords, true),
            'father_id' => json_decode($this->father_id, true),
            'spouse_id' => json_decode($this->spouse_id, true),
            'mother_id' => json_decode($this->mother_id, true),
            'religious_id' => json_decode($this->religious_id, true),
        ]);
    }

    public function rules(): array
    {
        return [
            'avatar' => [
                Rule::requiredIf(function () {
                    $this->hasFile('avatar');
                }),
                File::image()
                    ->min(10)
                    ->max(5 * 1024)
            ],
            'first_name' => ['required', 'string', 'min:3'],
            'last_name' => ['required', 'string', 'min:3'],
            'gender' => ['required', 'string', Rule::in(['male', 'female'])],
            'date_birth' => ['required', 'string', 'min:3'],
            'birth_place' => ['required', 'string', 'min:3'],
            'date_death' => ['required'],
            'death_certificate' => [
                Rule::requiredIf(function () {
                    $this->hasFile('death_certificate');
                }),
                File::types(['jpg', 'jpeg', 'png', 'pdf'])
                    ->max(40 * 1024)
            ],
            'profile_images.*' => ['required', 'mimes:jpg,jpeg,png,bmp,mp4', 'max:20000'],
        ];
    }

    public function messages(): array
    {
        return [
            'avatar' => 'Изображение аватара должно быть более 5 мб',
            'first_name.required' => 'Укажите Имя',
            'last_name.required' => 'Укажите Фамилию',
            'date_birth.required' => 'Укажите дату рождения',
            'birth_place.required' => 'Укажите место рождения',
            'date_death.required' => 'Укажите дату смерти',
            'death_certificate.file' => 'Документ "Свидетельство о смерти" должен быть в одном из форматов: pdf, jpg, png',
            'death_certificate.max' => 'Документ "Свидетельство о смерти" слишком большой',
            'profile_images.*.required' => 'Пожалуйста, загрузите фотографии или видео',
            'profile_images.*.mimes' => 'Только jpeg,png,bmp,mp4 файлы доступны',
            'profile_images.*.max' => 'Извините! Максимально доступный размер файла 20MB',
        ];
    }

}
