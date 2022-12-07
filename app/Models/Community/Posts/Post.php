<?php

namespace App\Models\Community\Posts;

use App\Models\Community\Community;
use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *@property int $id
 *@property int $author_id
 *@property int $community_id
 *@property string $title
 *@property string $description
 *@property boolean $pinned
 *@property Carbon $published_at
 *
 */
class Post extends Model
{
    use HasFactory;

    protected $table = 'community_posts';

    protected $fillable = [
        'author_id',
        'community_id',
        'title',
        'description',
        'pinned',
        'published_at',
    ];

    protected $casts = [
        'pinned' => 'boolean'
    ];

    public function isPinned(): bool
    {
        return $this->pinned;
    }

    public function community(): BelongsTo
    {
        return $this->belongsTo(Community::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class, 'post_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class,'community_post_tags');
    }
}
