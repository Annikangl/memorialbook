<?php

namespace App\Models\Cemetery;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'cemetery_gallery';

    public $timestamps = false;

    protected $fillable = [
        'cemetery_id',
        'item'
    ];

    public function cemetery(): BelongsTo
    {
        return $this->belongsTo(Cemetery::class);
    }
}
