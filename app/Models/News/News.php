<?php

namespace App\Models\News;

use App\Events\CreateNews;
use App\Models\Profile\Human\Human;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class News
 * @package App\Models\News
 *
 * @property int $id
 * @property int $author_id
 * @property int $human_id
 * @property string $title
 * @property string $content
 */
class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'human_id',
        'title',
        'content',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class);
    }

    public function human(): BelongsTo
    {
        return $this->belongsTo(Human::class);
    }

    public function hasProfile(): bool
    {
        return $this->title === CreateNews::USER_ADDED_PROFILE;
    }

    public function hasGallery(): bool
    {
        return $this->title === CreateNews::USER_ADDED_PHOTO;
    }

}
