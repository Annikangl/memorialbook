<?php

namespace App\Models\Cemetery;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cemetery extends Model
{
    use HasFactory;

    public const STATUS_DRAFT = 'Черновик';
    public const STATUS_MODERATION = 'На модерации';
    public const STATUS_ACTIVE = 'Опубликован';
    public const STATUS_CLOSED = 'Закрыт';

    public const ACCESS_OPEN = 'Открытый';
    public const ACCESS_DENIED = 'Закрытый';

    protected $fillable = [
        'title',
        'title_en',
        'subtitle',
        'email',
        'phone',
        'schedule',
        'address',
        'avatar',
        'banner',
        'description',
        'status',
        'moderators_comment',
        'access'
    ];

    public function scopeByName(Builder $query, string $name): Builder
    {
        return $query->where('title', 'LIKE', "%$name%")
            ->orWhere('title_en', 'LIKE', "%$name%");
    }

    public function scopeByAddress(Builder $query, string $address): Builder
    {
        return $query->where('address', 'LIKE', "%$address%");
    }


}
