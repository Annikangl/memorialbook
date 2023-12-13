<?php

namespace App\Models\Community\Posts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;
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

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb_900')
            ->performOnCollections('gallery')
            ->width(1000)
            ->height(600)
            ->nonQueued();
    }
}
