<?php

namespace App\Models\Community;

use App\Models\Community\Posts\Post;
use App\Models\User\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Community
 * @package App\Models\Community
 *
 * @property int $id
 * @property int $author_id
 * @property string $slug
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
    use HasFactory, Sluggable;

    protected $fillable = [
        'author_id',
        'slug',
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

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ]
        ];
    }
}
