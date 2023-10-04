<?php

namespace App\Models\Profile;

use App\Models\Profile\Base\Profile;
use Cviebrock\EloquentSluggable\Sluggable;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Human\Religion
 *
 * @property int $id
 * @property string $title
 * @property string|null $slug

 * @mixin Eloquent
 */
class Religion extends Model
{
    use HasFactory;

    protected $table = 'religions';

    public $timestamps = false;

    protected $fillable = ['title','slug'];

    public function profiles(): HasMany
    {
        return $this->hasMany(Profile::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
