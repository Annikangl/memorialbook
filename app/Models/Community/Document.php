<?php

namespace App\Models\Community;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'community_documents';

    protected $fillable = [
        'community_id',
        'item',
    ];


    public function community(): BelongsTo
    {
        return $this->belongsTo(Community::class);
    }
}
