<?php

namespace App\DTOs\Community;

use Illuminate\Http\UploadedFile;
use WendellAdriel\ValidatedDTO\ValidatedDTO;

class CommunityDTO extends ValidatedDTO
{
    public string $title;
    public string $subtitle;
    public ?string $description;
    public string $email;
    public string $phone;
    public ?string $website;
    public string $address;
    public ?UploadedFile $avatar;
    public ?UploadedFile $banner;
    public ?array $gallery;
    public ?array $media_removed_ids;

    /**
     * Defines the validation rules for the DTO.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:150'],
            'subtitle' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string'],
            'address' => ['required', 'string', 'max:150'],
            'website' => ['nullable', 'nullable', 'url'],
            'avatar' => ['nullable', 'file'],
            'banner' => ['nullable', 'file'],
            'gallery' => ['nullable', 'array'],
            'media_removed_ids' => ['nullable', 'array'],
            'gallery.*' => ['nullable', 'file'],
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
