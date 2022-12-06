<?php

namespace App\Models\Community;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'community_galleries';

    protected $fillable = [
        'community_id',
        'item',
        'extension',
    ];


    public function community(): BelongsTo
    {
        return $this->belongsTo(Community::class);
    }
}
