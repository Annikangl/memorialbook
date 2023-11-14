<?php

namespace App\Exceptions\Api\Auth;

use App\Traits\ApiException;
use Exception;

class LoginException extends Exception
{
    use ApiException;
}
