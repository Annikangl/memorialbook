<?php

namespace App\Models\Shop;

use App\Models\Profile\Cemetery\Cemetery;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shop extends Model
{
    use HasFactory;

    protected $table = 'shops';

    protected $fillable = [
        'user_id',
        'cemetery_id',
        'name',
        'address',
        'description',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cemetery(): BelongsTo
    {
        return $this->belongsTo(Cemetery::class);
    }
}
