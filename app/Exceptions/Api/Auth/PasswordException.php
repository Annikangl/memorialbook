<?php

namespace App\Exceptions\Api\Auth;

use App\Traits\ApiException;
use Exception;

class PasswordException extends Exception
{
    use ApiException;
}
