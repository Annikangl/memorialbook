<?php

namespace App\Enums;

enum UserRole: string
{
    case ROLE_USER = 'user';
    case ROLE_SELLER = 'seller';
}
