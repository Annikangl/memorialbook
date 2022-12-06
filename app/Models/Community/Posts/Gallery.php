<?php

namespace App\Models\Community\Posts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'community_post_galleries';

    protected $fillable = [
        'post_id',
        'item',
        'extension'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

}
