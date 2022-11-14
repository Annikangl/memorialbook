<?php

namespace App\Models\Community\Posts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'community_post_galleries';

}
