<?php

namespace App\Models\Cemetery;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Cemetery\Cemetery
 *
 * @property int $id
 * @property string $title
 * @property string $title_en
 * @property string $subtitle
 * @property string|null $email
 * @property string|null $phone
 * @property string $schedule
 * @property string $address
 * @property float|null $latitude
 * @property float|null $longitude
 * @property string|null $avatar
 * @property string|null $banner
 * @property string|null $description
 * @property string $status
 * @property string|null $moderators_comment
 * @property string $access
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|Cemetery byAddress(string $address)
 * @method static Builder|Cemetery byName(string $name)
 * @method static \Database\Factories\Cemetery\CemeteryFactory factory(...$parameters)
 * @method static Builder|Cemetery filtered()
 * @method static Builder|Cemetery active()
 * @method static Builder|Cemetery newModelQuery()
 * @method static Builder|Cemetery newQuery()
 * @method static Builder|Cemetery query()
 * @method static Builder|Cemetery whereAccess($value)
 * @method static Builder|Cemetery whereAddress($value)
 * @method static Builder|Cemetery whereAvatar($value)
 * @method static Builder|Cemetery whereBanner($value)
 * @method static Builder|Cemetery whereCreatedAt($value)
 * @method static Builder|Cemetery whereDescription($value)
 * @method static Builder|Cemetery whereEmail($value)
 * @method static Builder|Cemetery whereId($value)
 * @method static Builder|Cemetery whereLatitude($value)
 * @method static Builder|Cemetery whereLongitude($value)
 * @method static Builder|Cemetery whereModeratorsComment($value)
 * @method static Builder|Cemetery wherePhone($value)
 * @method static Builder|Cemetery whereSchedule($value)
 * @method static Builder|Cemetery whereStatus($value)
 * @method static Builder|Cemetery whereSubtitle($value)
 * @method static Builder|Cemetery whereTitle($value)
 * @method static Builder|Cemetery whereTitleEn($value)
 * @method static Builder|Cemetery whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $slug
 * @method static Builder|Cemetery findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static Builder|Cemetery whereSlug($value)
 * @method static Builder|Cemetery withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
class Cemetery extends Model
{
    use HasFactory, Sluggable;

    public const STATUS_DRAFT = 'Черновик';
    public const STATUS_MODERATION = 'На модерации';
    public const STATUS_ACTIVE = 'Опубликован';
    public const STATUS_CLOSED = 'Закрыт';

    public const ACCESS_OPEN = 'Открытый';
    public const ACCESS_DENIED = 'Закрытый';

    protected $fillable = [
        'title',
        'title_en',
        'subtitle',
        'email',
        'phone',
        'schedule',
        'address',
        'latitude',
        'longitude',
        'avatar',
        'banner',
        'description',
        'status',
        'moderators_comment',
        'access'
    ];

    public function scopeFiltered(Builder $query): Builder
    {
        return $query->when($name = request('NAME'), function (Builder $q) use ($name) {
            $q->where('title', 'LIKE', "%$name%")
                ->orWhere('title_en', 'LIKE', "%$name%");
        })->when($address = request('ADDRESS'), function (Builder $query) use ($address) {
            $query->where('address', 'LIKE', "%$address%");
        });
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_ACTIVE);
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
