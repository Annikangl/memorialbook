<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use HasFactory;

    protected $table = 'shop_services';

    protected $fillable = [
        'shop_id',
        'name',
        'description',
        'price',
    ];

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }

}
