<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'news_galleries';
    public $timestamps = false;

    protected $fillable = ['news_id', 'item'];
}
