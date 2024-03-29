<?php

namespace App\Models\Community\Posts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaPost extends Post implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'community_media_posts';

    public $timestamps = false;

    protected $fillable = [
        'filename',
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
