<?php

namespace App\DTOs\Profile;

use Illuminate\Http\UploadedFile;
use WendellAdriel\ValidatedDTO\Casting\CarbonCast;
use WendellAdriel\ValidatedDTO\Casting\CarbonImmutableCast;
use WendellAdriel\ValidatedDTO\ValidatedDTO;

class HumanDTO extends ValidatedDTO
{
    public string $first_name;
    public string $last_name;
    public ?string $middle_name;
    public string $gender;
    public string $date_birth;
    public string $date_death;
    public string $death_reason;
    public string|null $birth_place;
    public string|null $burial_place;
    public array|null $burial_coords;
    public UploadedFile|null $death_certificate;
    public UploadedFile|null $avatar;
    public UploadedFile|null $banner;
    public int|null $father_id;
    public int|null $mother_id;
    public int|null $spouse_id;
    public array|null $gallery;
    public string|null $description;
    public array|null $hobbies;
    public string $access;
    public array|null $removedImageIds;


    public int|null $religion_id;
    /**
     * Defines the validation rules for the DTO.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'min:3'],
            'last_name' => ['required', 'string', 'min:3'],
            'middle_name' => ['nullable', 'string', 'min:3'],
            'gender' => ['required', 'string'],
            'date_birth' => ['required', 'date', 'min:3'],
            'birth_place' => ['required', 'string', 'min:3'],
            'burial_place' => ['nullable', 'string'],
            'death_reason' => ['required', 'string'],
            'date_death' => ['nullable', 'date'],

            'father_id' => ['nullable', 'integer'],
            'mother_id' => ['nullable', 'integer'],
            'spouse_id' => ['nullable', 'integer'],

            'description' => ['nullable', 'string'],
            'hobbies' => ['nullable', 'array'],
            'religion_id' => ['required', 'integer'],
            'access' => ['required', 'string'],

            'burial_coords' => ['nullable', 'array'],
            'burial_coords.*' => ['nullable', 'numeric'],

            'avatar' => ['nullable', 'file'],
            'banner' => ['nullable', 'file'],
            'death_certificate' => ['nullable', 'file'],
            'gallery' => ['nullable', 'array'],
            'removedImageIds' => ['nullable', 'array'],
        ];
    }

    /**
     * Defines the default values for the properties of the DTO.
     *
     * @return array
     */
    protected function defaults(): array
    {
        return [
            'burial_coords' => ['lat' => null, 'lng' => null]
        ];
    }

    /**
     * Defines the type casting for the properties of the DTO.
     *
     * @return array
     */
    protected function casts(): array
    {
        return [

        ];
    }

    /**
     * Defines the custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [];
    }

    /**
     * Defines the custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [];
    }
}
