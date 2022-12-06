<?php

namespace App\Models\Community\Posts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'community_tags';

    protected $fillable = ['tag'];
}
