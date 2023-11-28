<?php

namespace App\DTOs\Community;

use WendellAdriel\ValidatedDTO\ValidatedDTO;

class CommunityPostDTO extends ValidatedDTO
{
    public int $community_id;
    public string $title;
    public string $description;
    public string $content_type;
    public bool $is_pinned;

    protected function rules(): array
    {
        return [
            'community_id' => ['required', 'integer'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'is_pinned' => ['required', 'bool'],
            'content_type' => ['required', 'string']
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
