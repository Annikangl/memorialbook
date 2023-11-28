<?php

namespace App\Models\Community\Posts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TextPost extends Post
{
    use HasFactory;

    protected $table = 'community_text_posts';

    protected $fillable = [
        'post_id',
        'text'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
