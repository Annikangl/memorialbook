<?php

namespace App\Models\Community\Posts;

use App\Models\Community\Community;
use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Collection;
use phpDocumentor\Reflection\Types\Self_;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @property int $id
 * @property int $author_id
 * @property int $community_id
 * @property boolean $is_pinned
 * @property Carbon $published_at
 *
 * @property Collection|TextPost|MediaPost $postable
 *
 */
class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    const TYPE_TEXT = 'TEXT_POST';
    const TYPE_MEDIA = 'MEDIA_POST';

    const TYPE_TEXT_WITH_MEDIA = 'TEXT_WITH_MEDIA_POST';

    protected $table = 'community_posts';

    protected $fillable = [
        'author_id',
        'community_id',
        'postable_type',
        'postable_id',
        'content_type',
        'is_pinned',
        'published_at',
    ];

    protected $casts = [
        'is_pinned' => 'boolean',
        'published_at' => 'datetime'
    ];

    /**
     * Chech if post is pinned
     * @return bool
     */
    public function isPinned(): bool
    {
        return $this->is_pinned;
    }

    /**
     * Get allowed post content types
     * @return string[]
     */
    public static function getContentTypes(): array
    {
        return [
            'TEXT_POST' => self::TYPE_TEXT,
            'MEDIA_POST' => self::TYPE_MEDIA,
            'TEXT_WITH_MEDIA_POST' => self::TYPE_TEXT_WITH_MEDIA,
        ];
    }

    public function isMediaPost(): bool
    {
        return $this->content_type === self::TYPE_MEDIA;
    }

    public function isTextPost(): bool
    {
        return $this->content_type === self::TYPE_TEXT;
    }

    public function community(): BelongsTo
    {
        return $this->belongsTo(Community::class);
    }

    public function postable(): MorphTo
    {
        return $this->morphTo();
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

//    public function registerMediaCollections(): void
//    {
//        $this->addMediaCollection('gallery');
//    }
//
//    public function registerMediaConversions(Media $media = null): void
//    {
//        $this->addMediaConversion('thumb_900')
//            ->performOnCollections('gallery')
//            ->width(1000)
//            ->height(600)
//            ->queued();
//    }

    public function getPostMedia(): array
    {
        $gallery = [
            'images' => [],
            'videos' => [],
        ];

        $this->postable->getMedia('gallery')->each(function (Media $item) use (&$gallery) {
            if (str_contains($item->mime_type, 'image')) {
                $gallery['images'][] = [
                    'id' => $item->id,
                    'url' => $item->getUrl('thumb_1024'),
                ];
            } elseif (str_contains($item->mime_type, 'video')) {
                $gallery['videos'][] = [
                    'id' => $item->id,
                    'url' => $item->getUrl(),
                ];
            }
        });

        return $gallery;
    }
}
