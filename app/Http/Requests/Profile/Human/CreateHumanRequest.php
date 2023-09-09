<?php


namespace App\Http\Requests\Profile\Human;


use App\Models\Profile\Human\Human;
use App\Traits\JsonFailedResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
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
        if ($this->expectsJson()) {
            throw new HttpResponseException(
                response()->json(["status" => false, "message" => $this->validator->errors()->first()],
                    422));
        } else {
            return redirect()->back()->with([
                'message' => $validator->errors()->first(),
                'alert-class' => 'alert-danger',
            ]);
        }
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
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'middle_name' => ['nullable', 'string', 'max:50'], // TODO change to required
            'gender' => ['required', 'string', Rule::in(Human::genderList())],
            'date_birth' => ['required', 'date'],
            'date_death' => ['required', 'date'],
            'death_reason' => ['required', 'string'],
            'birth_place' => ['required', 'string', 'min:3'],
            'burial_place' => ['nullable', 'string', 'min:3'],

            'father_id' => ['sometimes', 'integer'],
            'mother_id' => ['sometimes', 'integer'],
            'spouse_id' => ['sometimes', 'integer'],
            'description' => ['nullable', 'string'],
            'hobbies' => ['nullable', 'array'],
            'religion_id' => ['required', 'integer', 'exists:religions,id'],
            'as_draft' => ['required', 'boolean'],

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

            'banner' => [
                'sometimes',
                File::image()
                    ->max(5 * 1024)
                    ->dimensions(Rule::dimensions()->minWidth(1920)->minHeight(728))
            ],

            'gallery' => ['required', 'array'],
            'gallery.*' => ['required', 'mimes:jpg,jpeg,png,webp,mp4', 'max:20000'],

            'death_certificate' => [
                'nullable',
                File::types(['pdf'])
                    ->max(10 * 1024)
            ],
        ];
    }

}
