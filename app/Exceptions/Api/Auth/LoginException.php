<?php

namespace App\Exceptions\Api\Auth;

use App\Exceptions\Api\JsonException;

class LoginException extends JsonException
{
    protected function statusCode(): int
    {
        return 401;
    }
}
