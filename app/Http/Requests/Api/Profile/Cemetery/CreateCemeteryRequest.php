<?php

namespace App\Http\Requests\Api\Profile\Cemetery;

use App\Models\Profile\Cemetery\Cemetery;
use App\Rules\PhoneNumber;
use App\Traits\JsonFailedResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class CreateCemeteryRequest extends FormRequest
{
    use JsonFailedResponse;

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'subtitle' => ['nullable', 'string', 'min:3', 'max:255'],
            'address' => ['required', 'string', 'min:5'],
            'address_coords' => ['required', 'array:lat,lng'],
            'email' => ['required', 'email', 'unique:cemeteries'],
            'phone' => ['required', 'string', new PhoneNumber(), 'unique:cemeteries'],
            'schedule' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'access' => ['required', Rule::in(Cemetery::getAccessList())],
            'as_draft' => ['required', 'bool'],

            'avatar' => [
                'nullable',
                File::image()->min(5),
            ],

            'banner' => [
                'nullable',
                File::image()->max(10 * 1024),
            ],

            'confirming_documents' => ['nullable', 'array'],
            'confirming_documents.*' => [
                'sometimes',
                File::types(['application/pdf'])
                    ->max(10 * 1024),
            ],

            'gallery.*' => [
                'sometimes',
                File::types(['video/mp4', 'image/jpeg', 'image/png'])
                    ->max(30 * 1024),
            ],
        ];
    }

    public function authorize(): bool
    {
        return auth()->check();
    }
}
