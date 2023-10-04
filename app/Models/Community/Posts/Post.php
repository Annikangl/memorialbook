<?php

namespace App\Models\Community\Posts;

use App\Models\Community\Community;
use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 *@property int $id
 *@property int $author_id
 *@property int $community_id
 *@property string $title
 *@property string $description
 *@property boolean $is_pinned
 *@property Carbon $published_at
 *
 */
class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'community_posts';

    protected $fillable = [
        'author_id',
        'community_id',
        'title',
        'description',
        'is_pinned',
        'published_at',
    ];

    protected $casts = [
        'is_pinned' => 'boolean'
    ];

    public function isPinned(): bool
    {
        return $this->is_pinned;
    }

    public function community(): BelongsTo
    {
        return $this->belongsTo(Community::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class,'community_post_tags');
    }

    protected function publishedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('M d, Y')
        );
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('gallery');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb_900')
            ->performOnCollections('gallery')
            ->width(1000)
            ->height(600)
            ->nonQueued();
    }

    public function getGallery(): array
    {
        $gallery = [];

        $this->getMedia('gallery')->each(function (Media $item) use (&$gallery) {
            $gallery[] = $item->getUrl('thumb_900');
        });

        return $gallery;
    }
}
