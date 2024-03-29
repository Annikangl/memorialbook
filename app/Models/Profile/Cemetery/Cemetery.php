<?php

namespace App\Models\Profile\Cemetery;

use App\Models\Profile\Human\Human;
use App\Models\User\User;
use Cviebrock\EloquentSluggable\Sluggable;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\Profile\Cemetery\Cemetery
 *
 * @property int $id
 * @property int $user_id
 * @property string $slug
 * @property string $title
 * @property string $title_en
 * @property string $subtitle
 * @property string|null $email
 * @property string|null $phone
 * @property string $schedule
 * @property string $address
 * @property array $address_coords
 * @property string|null $description
 * @property string $status
 * @property string|null $moderators_comment
 * @property string $access
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $published_at
 * @property boolean $is_celebrity
 */
class Cemetery extends Model implements HasMedia
{
    use HasFactory, Sluggable, InteractsWithMedia, Filterable;

    public const STATUS_DRAFT = 'draft';
    public const STATUS_MODERATION = 'moderation';
    public const STATUS_ACTIVE = 'active';
    public const STATUS_CLOSED = 'closed';

    public const ACCESS_PUBLIC = 'public';
    public const ACCESS_PRIVATE = 'private';

    protected $fillable = [
        'user_id',
        'title',
        'title_en',
        'subtitle',
        'email',
        'phone',
        'schedule',
        'address',
        'address_coords',
        'description',
        'status',
        'moderators_comment',
        'access',
        'published_at',
        'is_celebrity'
    ];

    protected $casts = [
        'is_celebrity' => 'boolean',
        'address_coords' => 'array'
    ];

    public static function getAccessList(): array
    {
        return [
            self::ACCESS_PUBLIC,
            self::ACCESS_PRIVATE
        ];
    }

    public function onModeration(): bool
    {
        return $this->status === self::STATUS_MODERATION;
    }

    public function isClosed(): bool
    {
        return $this->status === self::STATUS_CLOSED;
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }

    /**
     * Get count filtered items
     * @param array $filters
     * @return int
     */
    public static function getFilteredCount(array $filters): int
    {
        return self::query()->filter($filters)->count();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function memorials(): HasMany
    {
        return $this->hasMany(Human::class, 'cemetery_id');
    }

    public function subscribers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'cemetery_subscribers');
    }

    public function isUserSubscribed(?User $user): bool
    {
        if (!$user) {
            return false;
        }

        return $this->subscribers()->wherePivot('user_id', $user->id)->exists();
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
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

        $this->addMediaCollection('confirming_documents');
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

    public function getGallery(): array
    {
        $gallery = [];

        $this->getMedia('gallery')->each(function (Media $item) use (&$gallery) {
            $gallery[] = $item->getUrl('thumb_500');
        });

        return $gallery;
    }

    public function getCustomGallery(): array
    {
        $gallery = [];

        $this->getMedia('gallery')->each(function (Media $item) use (&$gallery) {
            $path = $item->getOriginal('id');
            $gallery[] = '/'.$path.'/'.$item->getAttribute('file_name');
        });

        return $gallery;
    }
    public function getCustomDocuments(): array
    {
        $documents= [];

        $this->getMedia('confirming_documents')->each(function (Media $item) use (&$documents) {
            $path = $item->getOriginal('id');
            $documents[] = '/'.$path.'/'.$item->getAttribute('file_name');
        });

        return $documents;
    }

    public function getCustomAvatar()
    {
        $this->getMedia('avatars')->each(function (Media $item) use (&$avatar) {
            $path = $item->getOriginal('id');
            $avatar = '/'.$path.'/'.$item->getAttribute('file_name');
        });

        return $avatar;
    }
}
