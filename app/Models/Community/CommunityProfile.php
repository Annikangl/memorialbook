<?php

namespace App\Models\Community;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class CommunityProfile extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'profileable_id',
        'profileable_type'
    ];

    public function community(): BelongsTo
    {
        return $this->belongsTo(Community::class);
    }

    public function profileable(): MorphTo
    {
        return $this->morphTo();
    }
}
