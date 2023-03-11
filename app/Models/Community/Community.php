<?php

namespace App\Models\Community;

use App\Models\Community\Posts\Post;
use App\Models\Profile\Human\Human;
use App\Models\Profile\Pet\Pet;
use App\Models\Profile\Profile;
use App\Models\User\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * Class Community
 * @package App\Models\Community
 *
 * @property int $id
 * @property int $owner_id
 * @property string $slug
 * @property string $email
 * @property string $website
 * @property string $phone
 * @property string $address
 * @property double $latitude
 * @property double $longitude
 * @property string $title
 * @property string $avatar
 * @property string $subtitle
 * @property string $description
 * @property string $banner
 *
 * @method static Builder byUser(int $userId)
 */
class Community extends Model
{
    use HasFactory, Sluggable, InteractsWithMedia;

    public const AVATAR_PATH = 'uploads/communities/avatar';
    public const BANNER_PATH = 'uploads/communities/banner';
    public const DOCUMENTS_PATH = 'uploads/communities/document';
    public const GALLERY_PATH = 'uploads/communities/gallery';

    protected $fillable = [
        'owner_id',
        'slug',
        'email',
        'website',
        'phone',
        'address',
        'latitude',
        'longitude',
        'title',
        'avatar',
        'subtitle',
        'description',
        'banner',
    ];

    public function scopeByUser(Builder $query, int $userId): Builder
    {
        return $query->whereHas('users', function (Builder $query) use ($userId) {
            $query->where('user_id', $userId);
        });
    }

    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class ,'owner_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->as('subscribers');
    }

    public function humans(): BelongsToMany
    {
        return $this->belongsToMany(Human::class);
    }

    public function pets(): BelongsToMany
    {
        return $this->belongsToMany(Pet::class);
    }

    public function hasVideo(): bool
    {
        return $this->galleries()->where('extension', 'mp4')->exists();
    }

    public function isSubscribe(int $userId): bool
    {
        return $this->users()->where('id', $userId)->exists();
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
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
        $this->addMediaCollection('banner')
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
            ->performOnCollections('banner')
            ->width(1000)
            ->height(600)
            ->nonQueued();
    }
}
