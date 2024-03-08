<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShopRequisite extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'full_name',
        'legal_address',
        'post_address',
        'INN',
        'OGRN',
        'KPP',
        'BIK',
        'payment_account',
        'correspondent_account',
        'bank_name',
    ];


    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }
}
