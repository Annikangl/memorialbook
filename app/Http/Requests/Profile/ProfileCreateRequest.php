<?php


namespace App\Http\Requests\Profile;


use App\Models\Profile\Human\Human;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

/**
 * Class ProfileCreateRequest
 * @package App\Http\Requests\Human
 *
 * @property string $gender
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
            'gender' => json_decode($this->gender, true)['value'] ?? '',
            'date_birth' => $this->date_birth ?
                Carbon::parse($this?->date_birth)->format('Y-m-d')
                : $this?->date_birth,
            'date_death' => $this->date_death ?
                Carbon::parse($this->date_death)->format('Y-m-d')
                : $this->date_death,
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
            'first_name' => ['required', 'string', 'min:3'],
            'last_name' => ['required', 'string', 'min:3'],
            'gender' => ['required', 'string', Rule::in(array_values(Human::genderList()))],
            'date_birth' => ['required', 'date', 'min:3'],
            'birth_place' => ['nullable', 'string', 'min:3'],
            'burial_place' => ['nullable', 'string', 'min:3'],
            'death_reason' => ['nullable', 'string'],
            'date_death' => ['required', 'date'],
            'burial_place_coords' => [
                Rule::requiredIf(fn() => (bool)$this->get('burial_place')),
                'nullable',
                'array'
            ] ,
            'father_id' => ['sometimes', 'nullable', 'array'],
            'spouse_id' => ['sometimes', 'nullable', 'array'],
            'mother_id' => ['sometimes', 'nullable', 'array'],
            'profile_images.*' => ['required', 'mimes:jpg,jpeg,png,bmp,mp4', 'max:20000'],
            'description' => ['sometimes', 'nullable', 'string'],
            'religious_id' => ['sometimes', 'nullable'],
            'access' => ['required'],

            'avatar' => [
                Rule::requiredIf(fn () => $this->hasFile('avatar')),
                File::image()
                    ->min(1)
                    ->max(5 * 1024)
            ],

            'death_certificate' => [
                Rule::requiredIf(fn() =>  $this->hasFile('death_certificate')),
                File::types(['pdf'])
                    ->max(10 * 1024)
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'avatar' => 'Изображение аватара должно быть более 5 мб',
            'first_name.required' => 'Укажите Имя',
            'last_name.required' => 'Укажите Фамилию',
            'gender' => 'Выберите пол',
            'date_birth.required' => 'Укажите дату рождения',
            'birth_place.required' => 'Укажите место рождения',
            'burial_place.required' => 'Укажите место захоронения',
            'date_death.required' => 'Укажите дату смерти',
            'death_certificate.file' => 'Документ "Свидетельство о смерти" должен быть в одном из форматов: pdf, jpg, png',
            'death_certificate.max' => 'Документ "Свидетельство о смерти" слишком большой',
            'profile_images.*.required' => 'Пожалуйста, загрузите фотографии или видео',
            'profile_images.*.mimes' => 'Только jpeg,png,bmp,mp4 файлы доступны',
            'profile_images.*.max' => 'Извините! Максимально доступный размер файла 20MB',
        ];
    }

}
