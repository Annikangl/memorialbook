<?php

namespace App\Http\Requests\Api\Community\Memorials;

use App\Traits\JsonFailedResponse;
use Illuminate\Foundation\Http\FormRequest;

class AddCommunityMemorialRequest extends FormRequest
{
    use JsonFailedResponse;

    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'memorial_id' => ['required', 'integer'],
            'memorial_type' => ['required', 'string']
        ];
    }
}
