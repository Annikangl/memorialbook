<?php

namespace App\Models\Profile\Pet;

use App\Models\Profile\Base\Profile;
use App\Models\Profile\Hobby;
use App\Models\User\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Pet
 * @package App\Models\Profile\Pet
 *
 *  * @method static Builder|Pet byUser(int $userId)
 */
class Pet extends Profile
{
    use HasFactory, Sluggable;

    public const AVATAR_PATH = 'uploads/pets/avatar';
    public const DOCUMENTS_PATH = 'uploads/pets/document';
    public const GALLERY_PATH = 'uploads/pets/gallery';

    public function scopeByUser(Builder $query, int $userId): Builder
    {
        return $query->select(['id', 'first_name', 'last_name', 'slug', 'avatar', 'date_birth', 'date_death'])
            ->where('user_id', $userId);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function hobbies(): BelongsToMany
    {
        return $this->belongsToMany(Hobby::class);
    }

    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['first_name', 'last_name']
            ]
        ];
    }
}
