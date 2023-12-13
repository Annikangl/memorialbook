<?php

namespace App\DTOs\Community;

use Illuminate\Validation\Rules\File;
use WendellAdriel\ValidatedDTO\ValidatedDTO;

class CommunityPostDTO extends ValidatedDTO
{
    public int $community_id;
    public string $content_type;
    public bool $is_pinned;
    public ?string $title;
    public ?string $description;
    public ?array $post_media;

    protected function rules(): array
    {
        return [
            'community_id' => ['required', 'integer'],
            'is_pinned' => ['required', 'bool'],
            'content_type' => ['required', 'string'],
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'post_media' => ['nullable', 'array'],
            'post_media.*' => [
                'nullable',
                File::types(['image/jpeg', 'image/png', 'image/webp', 'image/gif', 'video/mp4', 'video/avi', 'video/mpeg'])
                    ->max(15 * 1024)
            ],
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
