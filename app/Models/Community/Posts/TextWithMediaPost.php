<?php

namespace App\Models\Community\Posts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Carbon;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class TextWithMediaPost extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'community_text_with_media_post';

    protected $fillable = [
        'title',
        'description',
    ];

    public function post(): MorphOne
    {
        return $this->morphOne(Post::class, 'postable');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('gallery');
    }

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb_1024')
            ->performOnCollections('gallery')
            ->fit(Manipulations::FIT_CROP, 1024, 720)
            ->queued();
    }
}
