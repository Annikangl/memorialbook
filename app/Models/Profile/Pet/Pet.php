<?php

namespace App\Models\Profile\Pet;

use App\Models\Community\Community;
use App\Models\Profile\Human\Human;
use App\Models\Profile\Profile;
use App\Models\User\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
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

    protected $fillable = [
        'user_id',
        'owner_id',
        'name',
        'breed',
        'description',
        'date_birth',
        'date_death',
        'birth_place',
        'burial_place',
        'death_reason',
        'status',
        'is_celebrity',
    ];

    protected $casts = [
        'is_celebrity' => 'boolean'
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Human::class, 'owner_id', 'id');
    }

    public function scopeByUser(Builder $query, int $userId): Builder
    {
        return $query->select(['id', 'name', 'slug', 'date_birth', 'date_death'])
            ->where('user_id', $userId);
    }

    public function communities(): MorphMany
    {
        return $this->morphMany(Community::class, 'profilable');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['name']
            ]
        ];
    }

    public function getFullNameAttribute(): string
    {
        return $this->name;
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatars')
            ->singleFile()
            ->useFallbackUrl(asset('assets/media/media/empty_avatar.png'))
            ->useFallbackPath(asset('assets/media/media/empty_avatar.png'));

        $this->addMediaCollection('banners')
            ->useFallbackUrl(asset('assets/media/media/empty_banner.png'))
            ->useFallbackPath(asset('assets/media/media/empty_banner.png'))
            ->singleFile();

        $this->addMediaCollection('gallery');
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
