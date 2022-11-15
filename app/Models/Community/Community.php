<?php

namespace App\Models\Community;

use App\Models\Community\Posts\Post;
use App\Models\User\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Community extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'author_id',
        'slug',
        'title',
        'subtitle',
        'description',
        'banner',
    ];

    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class);
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
        return $this->belongsToMany(User::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ]
        ];
    }
}
