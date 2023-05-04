<?php


namespace App\Http\Requests\Profile\Human;


use App\Models\Profile\Human\Human;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

/**
 * Class CreateHumanRequest
 * @package App\Http\Requests\Human
 *
 * @property string $gender
 * @property string $date_birth
 * @property string $date_death
 * @property string $burial_coords
 * @property string $father_id
 * @property string $spouse_id
 * @property string $mother_id
 * @property string $religious_id
 */
class CreateHumanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return \Auth::check();
    }

    protected function failedValidation(Validator $validator)
    {
        return redirect()->back()->with([
            'message' => $validator->errors()->first(),
            'alert-class' => 'alert-danger',
        ]);
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'burial_coords' => json_decode($this->burial_coords, true),
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
            'father_id' => ['sometimes', 'integer'],
            'mother_id' => ['sometimes', 'integer'],
            'spouse_id' => ['sometimes', 'integer'],
            'gallery.*' => ['required', 'mimes:jpg,jpeg,png,webp,mp4', 'max:20000'],
            'description' => ['nullable', 'string'],
            'religion_id' => ['nullable', 'integer'],
            'access' => ['required', Rule::in(Human::getAccessList())],

            'burial_coords' => [
                'required_with:burial_place',
                'nullable',
                'array:lat,lng'
            ],

            'avatar' => [
                'nullable',
                File::image()
                    ->min(1)
                    ->max(5 * 1024)
            ],

            'death_certificate' => [
                'nullable',
                File::types(['pdf'])
                    ->max(10 * 1024)
            ],
        ];
    }

}
