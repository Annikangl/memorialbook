<?php

namespace App\Models\Profile;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReligiousView extends Model
{
    use HasFactory;

    protected $table = 'profile_religious_views';

    public $timestamps = false;

    protected $fillable = ['title','slug'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
