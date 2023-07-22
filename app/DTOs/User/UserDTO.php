<?php

namespace App\DTOs\User;

use Illuminate\Http\UploadedFile;
use WendellAdriel\ValidatedDTO\ValidatedDTO;

class UserDTO extends ValidatedDTO
{
    public string $username;
    public string $email;
    public ?string $phone;
    public ?string $password;
    public ?string $device_name;
    public ?string $fcm_token;
    public ?string $location;
    public ?UploadedFile $avatar;

    /**
     * Defines the validation rules for the DTO.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'username' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['nullable', 'string'],
            'password' => ['nullable', 'string'],
            'device_name' => ['nullable', 'string'],
            'fcm_token' => ['nullable', 'string'],
            'location' => ['nullable', 'string', 'max:15'],
            'avatar' => ['nullable']
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
