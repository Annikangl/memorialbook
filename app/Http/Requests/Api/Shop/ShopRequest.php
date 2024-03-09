<?php

namespace App\Http\Requests\Api\Shop;

use App\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
            'phone' => ['required', 'string', new PhoneNumber(), 'unique:shops,phone'],
            'email' => ['required', 'email', 'unique:shops,email'],
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
}
