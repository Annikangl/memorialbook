<?php

namespace App\DTOs\Shop;

use App\Enums\ShopStatus;
use App\Rules\PhoneNumber;
use WendellAdriel\ValidatedDTO\Casting\BooleanCast;
use WendellAdriel\ValidatedDTO\ValidatedDTO;

class ShopDTO extends ValidatedDTO
{
    public string $name;
    public string $description;
    public string $phone;
    public string $email;
    public string $address;
    public array $shop_address_coords;
    public string $cemetery_address;
    public array $cemetery_address_coords;
    public bool $has_pickup;
    public string $full_name;
    public string $legal_address;
    public string $post_address;
    public string $INN;
    public string $OGRN;
    public string $KPP;
    public string $BIK;
    public string $payment_account;
    public string $correspondent_account;
    public string $bank_name;

    public string $status;
    public ?int $cemetery_id;


    /**
     * Defines the validation rules for the DTO.
     */
    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
            'phone' => ['required', 'string', new PhoneNumber()],
            'email' => ['required', 'email'],
            'address' => ['required', 'string', 'max:255'],
            'shop_address_coords' => ['required_with:address', 'array'],
            'cemetery_address' => ['required', 'string', 'max:255'],
            'cemetery_address_coords' => ['required_with:cemetery_address', 'array'],
            'has_pickup' => ['required', 'boolean'],
            'full_name' => ['required', 'string', 'max:255'],
            'legal_address' => ['required', 'string', 'max:255'],
            'post_address' => ['required', 'string', 'max:255'],
            'INN' => ['required', 'string', 'max:255'],
            'OGRN' => ['required', 'string', 'max:255'],
            'KPP' => ['required', 'string', 'max:255'],
            'BIK' => ['required', 'string', 'max:11'],
            'payment_account' => ['required', 'string', 'max:34'],
            'correspondent_account' => ['required', 'string', 'max:34'],
            'bank_name' => ['required', 'string', 'max:255'],
        ];
    }

    /**
     * Defines the default values for the properties of the DTO.
     */
    protected function defaults(): array
    {
        return [
            'status' => ShopStatus::ON_MODERATION->value,
            'cemetery_id' => null,
        ];
    }

    /**
     * Defines the type casting for the properties of the DTO.
     */
    protected function casts(): array
    {
        return [
            'has_pickup' => new BooleanCast()
        ];
    }

    /**
     * Maps the DTO properties before the DTO instantiation.
     */
    protected function mapBeforeValidation(): array
    {
        return [];
    }

    /**
     * Maps the DTO properties before the DTO export.
     */
    protected function mapBeforeExport(): array
    {
        return [];
    }

    /**
     * Defines the custom messages for validator errors.
     */
    public function messages(): array
    {
        return [];
    }

    /**
     * Defines the custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [];
    }
}
