<?php

namespace App\Models\Profile\Pet;

use App\Models\Community\Community;
use App\Models\Profile\Human\Human;
use App\Models\Profile\Profile;
use App\Models\User\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @method static Builder|Pet byUser(int $userId)
 * @method static Builder|Pet query()
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
        'date_birth' => 'datetime',
        'date_death' => 'datetime',
        'is_celebrity' => 'boolean',
    ];

    protected $with = ['owner','user'];

    public function scopeByUser(Builder $query, int $userId): Builder
    {
        return $query->select(['id', 'name', 'slug', 'date_birth', 'date_death'])
            ->where('user_id', $userId);
    }

    public function communities(): BelongsToMany
    {
        return $this->belongsToMany(Community::class, 'community_profiles', 'profileable_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Human::class, 'owner_id', 'id');
    }

    protected function fullName(): Attribute
    {
        return new Attribute(
            get: fn() => $this->name
        );
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

    /**
     * Convert images
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->performOnCollections('avatars')
            ->fit(Manipulations::FIT_CROP, 150, 150)
            ->sharpen(10)
            ->queued();

        $this->addMediaConversion('thumb_500')
            ->performOnCollections('gallery')
            ->fit(Manipulations::FIT_CROP, 640)
            ->sharpen(10)
            ->queued();

        $this->addMediaConversion('thumb_900')
            ->performOnCollections('banners')
            ->fit(Manipulations::FIT_CROP, 1000)
            ->queued();
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['name']
            ]
        ];
    }
}
