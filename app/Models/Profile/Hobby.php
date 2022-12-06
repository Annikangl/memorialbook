<?php

namespace App\Models\Profile;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Human\Hobby
 *
 * @property int $id
 * @property string $title
 * @property string|null $slug
 * @method static \Database\Factories\Profile\HobbyFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Hobby findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Hobby newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hobby newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hobby query()
 * @method static \Illuminate\Database\Eloquent\Builder|Hobby whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hobby whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hobby whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hobby withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 * @mixin \Eloquent
 */
class Hobby extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'hobbies';

    public $timestamps = false;

    protected $fillable = ['title','slug',];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
