<?php

namespace App\Enums;

enum ShopStatus: string
{
    const ON_MODERATION = 'on_moderation';
    const ACTIVE = 'active';
    const CANCELED = 'canceled';
}
