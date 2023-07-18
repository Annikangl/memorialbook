<?php

namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait JsonFailedResponse
{
    protected function failedValidation(Validator $validator): void
    {
        if ($this->expectsJson()) {
            throw new HttpResponseException(
                response()->json(["status" => false, "message" => $this->validator->errors()->first()],
                    422));
        }
    }
}
