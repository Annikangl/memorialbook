<?php

namespace App\Models\Community;

use App\Models\Community\Posts\Post;
use App\Models\User\User;
use Cviebrock\EloquentSluggable\Sluggable;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
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
 * @property bool $is_celebrity
 *
 * @method static Builder|Community byUser(int $userId)
 * @method static Builder|Community query()
 */
class Community extends Model implements HasMedia
{
    use HasFactory, Sluggable, InteractsWithMedia, Filterable;

    protected $fillable = [
        'owner_id',
        'slug',
        'email',
        'website',
        'phone',
        'address',
        'title',
        'avatar',
        'subtitle',
        'description',
        'is_celebrity',
    ];

    public function scopeByUser(Builder $query, int $userId): Builder
    {
        return $query->whereHas('users', function (Builder $query) use ($userId) {
            $query->where('user_id', $userId);
        });
    }

    public function isUserSubscribed(?User $user): bool
    {
        if (!$user) {
            return false;
        }

        return $this->users()->wherePivot('user_id', $user->id)->exists();
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'community_users')
            ->as('subscribers');
    }

    public function communityProfiles(): HasMany
    {
        return $this->hasMany(CommunityProfile::class);
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
            ->useFallbackUrl(asset('assets/media/media/empty_avatar.png'))
            ->useFallbackPath(asset('assets/media/media/empty_avatar.png'))
            ->singleFile();

        $this->addMediaCollection('banners')
            ->useFallbackUrl(asset('assets/media/media/empty_banner.png'))
            ->useFallbackPath(asset('assets/media/media/empty_banner.png'))
            ->singleFile();

        $this->addMediaCollection('gallery');

        $this->addMediaCollection('documents');
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

        $this->addMediaConversion('thumb_500')
            ->performOnCollections('gallery')
            ->width(500)
            ->height(550)
            ->nonQueued();

        $this->addMediaConversion('thumb_900')
            ->performOnCollections('banners')
            ->width(1000)
            ->height(600)
            ->nonQueued();
    }

    public function getPictures(): array
    {
        $pictures = [];

        $this->getMedia('gallery')->filter(function (Media $media) use (&$pictures) {
            $pictures[] = $media->getUrl('thumb_500');
        });

        return $pictures;
    }

    public function getMovies(): array
    {
        return [];
    }
}
