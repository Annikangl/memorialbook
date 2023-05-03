<?php

namespace App\DTOs\Profile;

use Illuminate\Http\UploadedFile;
use WendellAdriel\ValidatedDTO\ValidatedDTO;

class PetDTO extends ValidatedDTO
{
    public string $name;

    public string $breed;

    public string $dateBirth;

    public string $dateDeath;

    public string|null $birthPlace;

    public string|null $burialPlace;

    public string|null $deathReason;

    public string|null $description;

    public UploadedFile|null $avatar;

    public UploadedFile|null $banner;

    public array|null $gallery;
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
            'dateBirth' => ['required', 'date'],
            'dateDeath' => ['required', 'date'],
            'birthPlace' => [ 'nullable', 'string'],
            'burialPlace' => ['nullable', 'string'],
            'burialCoords' => ['nullable', 'array'],
            'deathReason' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'avatar' => ['nullable', 'image'],
            'banner' => ['nullable', 'image'],
            'gallery' => ['nullable', 'array'],
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
