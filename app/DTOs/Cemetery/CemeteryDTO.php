<?php

namespace App\DTOs\Cemetery;

use App\Models\Cemetery\Cemetery;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
use WendellAdriel\ValidatedDTO\Casting\BooleanCast;
use WendellAdriel\ValidatedDTO\ValidatedDTO;

class CemeteryDTO extends ValidatedDTO
{
    public string $title;

    public string $titleEn;

    public string $subtitle;

    public string $address;

    public array|null $addressCoords;

    public string|null $email;

    public string|null $phone;

    public string|null $schedule;

    public string|null $description;

    public string $access;

    public UploadedFile|null $avatar;

    public UploadedFile|null $banner;

    public array|null $gallery;

    public string|null $draft;

    protected function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3'],
            'titleEn' => ['nullable', 'string', 'min:3'],
            'subtitle' => ['nullable', 'string', 'min:3'],
            'address' => ['required', 'string'],
            'addressCoords' => ['nullable', 'array:lat,lng'],
            'email' => ['nullable', 'email'],
            'phone' => ['nullable', 'string'],
            'schedule' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'access' => ['required', 'string'],
            'draft' => ['nullable', 'string'],
            'avatar' => ['nullable', 'file'],
            'banner' => ['nullable', 'file'],
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
            'draft' => new BooleanCast()
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
