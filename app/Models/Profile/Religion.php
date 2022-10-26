<?php

namespace App\Models\Profile;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Profile\Religion
 *
 * @property int $id
 * @property string $title
 * @property string|null $slug
 * @method static \Database\Factories\Profile\ReligionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Religion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Religion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Religion query()
 * @method static \Illuminate\Database\Eloquent\Builder|Religion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Religion whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Religion whereTitle($value)
 * @mixin \Eloquent
 */
class Religion extends Model
{
    use HasFactory;

    protected $table = 'religions';

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
