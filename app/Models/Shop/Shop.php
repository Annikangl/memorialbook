<?php

namespace App\Models\Shop;

use App\Enums\ShopStatus;
use App\Models\Profile\Cemetery\Cemetery;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Shop extends Model
{
    use HasFactory;

    protected $table = 'shops';

    protected $fillable = [
        'user_id',
        'cemetery_id',
        'name',
        'email',
        'phone',
        'address',
        'shop_address_coords',
        'cemetery_address',
        'cemetery_address_coords',
        'description',
        'status',
        'has_pickup',
    ];

    protected $casts = [
        'has_pickup' => 'boolean',
        'cemetery_address_coords' => 'array',
        'shop_address_coords' => 'array',
        'status' => ShopStatus::class,
    ];

    public function requisite(): HasOne
    {
        return $this->hasOne(ShopRequisite::class)->withDefault();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cemetery(): BelongsTo
    {
        return $this->belongsTo(Cemetery::class);
    }
}
