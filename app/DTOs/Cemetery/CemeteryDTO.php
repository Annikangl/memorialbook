<?php

namespace App\DTOs\Cemetery;

use Illuminate\Http\UploadedFile;
use WendellAdriel\ValidatedDTO\Casting\BooleanCast;
use WendellAdriel\ValidatedDTO\ValidatedDTO;

class CemeteryDTO extends ValidatedDTO
{
    public string $title;

    public ?string $titleEn;

    public ?string $subtitle;

    public string $address;

    public ?array $address_coords;

    public ?string $email;

    public ?string $phone;

    public ?string $schedule;

    public ?string $description;

    public string $access;

    public ?UploadedFile $avatar;

    public ?UploadedFile $banner;

    public ?array $confirming_documents;

    public ?array $gallery;

    public ?string $as_draft;

    protected function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3'],
            'titleEn' => ['nullable', 'string', 'min:3'],
            'subtitle' => ['nullable', 'string', 'min:3'],
            'address' => ['required', 'string'],
            'address_coords' => ['nullable', 'array:lat,lng'],
            'email' => ['nullable', 'email'],
            'phone' => ['nullable', 'string'],
            'schedule' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'access' => ['required', 'string'],
            'as_draft' => ['nullable', 'string'],
            'avatar' => ['nullable'],
            'banner' => ['nullable', 'file'],
            'confirming_documents' => ['nullable', 'array'],
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
        return [
            'as_draft' => new BooleanCast()
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
