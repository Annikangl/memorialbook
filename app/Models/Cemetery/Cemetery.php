<?php

namespace App\Models\Cemetery;

use App\Models\Profile\Human\Human;
use App\Models\User\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\Cemetery\Cemetery
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
    use HasFactory, Sluggable, InteractsWithMedia;

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

    public function scopeFiltered(Builder $query): Builder
    {
        return $query->when($name = request('place_name'), function (Builder $q) use ($name) {
            $q->where('title', 'LIKE', "%$name%")
                ->orWhere('title_en', 'LIKE', "%$name%");
        })->when($address = request('place'), function (Builder $query) use ($address) {
            $query->where('address', 'LIKE', "%$address%");
        });
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

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

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatars')
            ->useFallbackUrl(asset('assets/media/media/empty_profile_avatar.png'))
            ->useFallbackPath(asset('assets/media/media/empty_profile_avatar.png'));

        $this->addMediaCollection('gallery');

        $this->addMediaCollection('banners')
            ->singleFile();

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
}
