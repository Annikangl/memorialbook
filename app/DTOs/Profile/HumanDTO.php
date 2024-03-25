<?php

namespace App\DTOs\Profile;

use App\Models\Profile\Human\Religion;
use Illuminate\Http\UploadedFile;
use WendellAdriel\ValidatedDTO\Casting\BooleanCast;
use WendellAdriel\ValidatedDTO\Casting\CarbonCast;
use WendellAdriel\ValidatedDTO\Casting\CarbonImmutableCast;
use WendellAdriel\ValidatedDTO\Casting\IntegerCast;
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
    public ?string $birth_place;
    public ?string $burial_place;
    public ?array $burial_coords;
    public ?UploadedFile $death_certificate;
    public ?UploadedFile $avatar;
    public ?UploadedFile $banner;
    public ?string $father_id;
    public ?string $mother_id;
    public ?string $spouse_id;
    public ?int $religion_id;
    public ?array $gallery;
    public ?string $description;
    public ?array $hobbies;
    public string $access;
    public ?array $removedImageIds;
    public bool $as_draft;

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

            'religion_id' => ['nullable', 'integer'],
            'father_id' => ['nullable', 'integer'],
            'mother_id' => ['nullable', 'integer'],
            'spouse_id' => ['nullable', 'integer'],

            'description' => ['nullable', 'string'],
            'hobbies' => ['nullable', 'array'],
            'access' => ['required', 'string'],

            'burial_coords' => ['nullable', 'array'],
            'burial_coords.*' => ['nullable', 'numeric'],

            'avatar' => ['nullable'],
            'banner' => ['nullable'],
            'death_certificate' => ['nullable'],
            'gallery' => ['nullable', 'array'],
            'removedImageIds' => ['nullable', 'array'],
            'as_draft' => ['required', 'bool'],
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
            'burial_coords' => ['lat' => null, 'lng' => null],
            'religion_id' => Religion::getNoneReligion()->id,
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
            'religion_id' => new IntegerCast(),
            'as_draft' => new BooleanCast(),
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
