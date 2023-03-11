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
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * Class Pet
 * @package App\Models\Profile\Pet
 *
 *  * @method static Builder|Pet byUser(int $userId)
 *  * @method static Builder|Pet query()
 */
class Pet extends Profile
{
    use HasFactory, Sluggable;

    protected $fillable = ['name', 'breed', 'avatar', 'banner', 'description', 'date_birth',
        'date_death',
        'birth_place',
        'burial_place',
        'death_reason'
    ];

    public function scopeByUser(Builder $query, int $userId): Builder
    {
        return $query->select(['id', 'name', 'slug', 'avatar', 'date_birth', 'date_death'])
            ->where('user_id', $userId);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['name']
            ]
        ];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatars')
            ->singleFile()
            ->useFallbackUrl(asset('assets/media/media/empty_profile_avatar.png'))
            ->useFallbackPath(asset('assets/media/media/empty_profile_avatar.png'));

        $this->addMediaCollection('gallery');
        $this->addMediaCollection('banners')
            ->singleFile();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->performOnCollections('avatars')
            ->width(150)
            ->height(150)
            ->nonQueued();

        $this->addMediaConversion('thumb_500')
            ->width(500)
            ->height(550)
            ->nonQueued();

        $this->addMediaConversion('thumb_900')
            ->performOnCollections('banners')
            ->width(1000)
            ->height(600)
            ->nonQueued();
    }
}
