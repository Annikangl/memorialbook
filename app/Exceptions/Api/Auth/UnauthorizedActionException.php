<?php

namespace App\Exceptions\Api\Auth;

use App\Traits\ApiException;
use Exception;

class UnauthorizedActionException extends Exception
{
    use ApiException;
}
