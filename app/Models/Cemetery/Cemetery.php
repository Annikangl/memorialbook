<?php

namespace App\Models\Cemetery;

use App\Models\Profile\Profile;
use App\Models\User\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public const AVATAR_PATH = 'uploads/cemeteries/avatar';
    public const BANNER_PATH = 'uploads/cemeteries/banner';
    public const DOCUMENTS_PATH = 'uploads/cemeteries/document';
    public const GALLERY_PATH = 'uploads/profiles/gallery';

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

    public static function getAccessList(): array
    {
        return [
            self::ACCESS_OPEN,
            self::ACCESS_DENIED
        ];
    }

    public static function createFromProfile(string $title, array $coords, string $address): self
    {
        return self::create([
            'title' => $title,
            'latitude' => (double) $coords['lat'],
            'longitude' => (double) $coords['lng'],
            'address' => $address,
            'status' => self::STATUS_DRAFT,
            'access' => self::ACCESS_DENIED,
        ]);
    }

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function profiles(): HasMany
    {
        return $this->hasMany(Profile::class);
    }

    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class);
    }

    public function socials(): HasMany
    {
        return $this->hasMany(CemeterySocial::class);
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
