<?php

namespace App\Models\News;

use App\Events\CreateNews;
use App\Models\Profile\Profile;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'profile_id',
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

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
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
