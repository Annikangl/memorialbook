<?php

namespace App\Enums;

enum ShopStatus: string
{
    case ON_MODERATION = 'on_moderation';
    case ACTIVE = 'active';
    case CANCELED = 'canceled';
}
