<?php

namespace App\DTOs\Profile;

use Illuminate\Http\UploadedFile;
use WendellAdriel\ValidatedDTO\Casting\BooleanCast;
use WendellAdriel\ValidatedDTO\Casting\IntegerCast;
use WendellAdriel\ValidatedDTO\ValidatedDTO;

class PetDTO extends ValidatedDTO
{
    public int $owner_id;
    public string $name;
    public string $breed;
    public string $date_birth;
    public string $date_death;
    public ?string $birth_place;
    public ?string $burial_place;
    public ?string $death_reason;
    public ?string $description;
    public ?UploadedFile $avatar;
    public ?UploadedFile $banner;
    public ?array $gallery;
    public bool $as_draft;
    public ?bool $is_celebrity;

    /**
     * Defines the validation rules for the DTO.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'breed' => ['required', 'string'],
            'date_birth' => ['required', 'date'],
            'date_death' => ['required', 'date'],
            'birth_place' => [ 'nullable', 'string'],
            'burial_place' => ['nullable', 'string'],
            'owner_id' => ['required', 'integer'],
            'death_reason' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'avatar' => ['nullable', 'image'],
            'banner' => ['nullable', 'image'],
            'gallery' => ['nullable', 'array'],
            'as_draft' => ['required', 'bool'],
            'is_celebrity' => ['nullable', 'bool'],
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
            'is_celebrity' => false,
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
            'owner_id' => new IntegerCast(),
            'as_draft' => new BooleanCast(),
            'is_celebrity' => new BooleanCast(),
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
