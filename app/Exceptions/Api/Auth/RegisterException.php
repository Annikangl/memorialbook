<?php

namespace App\Exceptions\Api\Auth;

use App\Traits\ApiException;
use Exception;

class RegisterException extends Exception
{
    use ApiException;
}
