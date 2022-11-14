<?php

namespace App\Models\Community\Posts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $table = 'community_posts';

    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class, 'post_id');
    }
}
