<?php

namespace App\Models\Community\Posts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class TextPost extends Post
{
    use HasFactory;

    protected $table = 'community_text_posts';

    public $timestamps = false;

    protected $fillable = [
        'title',
        'description'
    ];

    public function post(): MorphOne
    {
        return $this->morphOne(Post::class, 'postable');
    }
}
