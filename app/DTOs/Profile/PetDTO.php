<?php

namespace App\DTOs\Profile;

use Illuminate\Http\UploadedFile;
use WendellAdriel\ValidatedDTO\ValidatedDTO;

class PetDTO extends ValidatedDTO
{
    public int $owner_id;
    public string $name;
    public string $breed;
    public string $date_birth;
    public string $date_death;
    public string|null $birth_place;
    public string|null $burial_place;
    public array|null $burial_coords;
    public string|null $death_reason;
    public string|null $description;
    public UploadedFile|null $avatar;
    public UploadedFile|null $banner;
    public array|null $gallery;
    public bool $as_draft;

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
            'burial_coords' => ['nullable', 'array'],
            'owner_id' => ['required', 'integer'],
            'death_reason' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'avatar' => ['nullable', 'image'],
            'banner' => ['nullable', 'image'],
            'gallery' => ['nullable', 'array'],
            'as_draft' => ['required', 'bool']
        ];
    }

    /**
     * Defines the default values for the properties of the DTO.
     *
     * @return array
     */
    protected function defaults(): array
    {
        return [];
    }

    /**
     * Defines the type casting for the properties of the DTO.
     *
     * @return array
     */
    protected function casts(): array
    {
        return [];
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
