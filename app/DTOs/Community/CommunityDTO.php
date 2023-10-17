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
    public ?UploadedFile $avatar;
    public ?UploadedFile $banner;
    public ?array $gallery;

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
            'email' => ['required', 'email', 'unique:cemeteries'],
            'phone' => ['required', 'string', 'min:8', 'max:15'],
            'website' => ['sometimes', 'nullable', 'url'],
            'avatar' => ['nullable', 'file'],
            'banner' => ['nullable', 'file'],
            'gallery.*' => ['sometimes', 'file'],
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
