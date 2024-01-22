<?php

namespace App\Models\Profile\Human;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Human\Religion
 *
 * @property int $id
 * @property string $title
 * @property string|null $slug

 * @mixin Eloquent
 */
class Religion extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'slug'
    ];

    public function humans(): HasMany
    {
        return $this->hasMany(Human::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
