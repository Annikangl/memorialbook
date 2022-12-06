<?php

namespace App\Models\Profile\Human;

use App\Models\Cemetery\Cemetery;
use App\Models\Profile\Base\Profile;
use App\Models\Profile\Hobby;
use App\Models\Profile\Religion;
use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


/**
 * App\Models\Human
 * @package App\Models\Profile\Human
 *
 * @property string|null $gender
 * @property string|null $birth_place
 * @property string|null $burial_place
 * @property string|null $death_certificate
 * @property string|null $moderators_comment
 * @property string|null $access
 * @property int|null $father_id
 * @property int|null $mother_id
 * @property int|null $child_id
 * @property int|null $spouse_id
 * @property string|null $published_at
 *
 * @method static Builder|Human filtered()
 * @method static Builder|Human query()
 * @property float|null $latitude
 * @property float|null $longitude
 * @property-read Human|null $child
 * @property-read Human|null $father
 * @property-read Collection|\App\Models\Profile\Human\Gallery[] $galleries
 * @property-read int|null $galleries_count
 * @property-read Collection|\App\Models\Profile\Hobby[] $hobbies
 * @property-read int|null $hobbies_count
 * @property-read Human|null $mother
 * @property-read Collection|\App\Models\Profile\Religion[] $religions
 * @property-read int|null $religions_count
 * @property-read Human|null $spouse
 * @method static Builder|Human active()
 * @method static Builder|Human byUser(int $userId)
 * @method static Builder|Collection bySearch(string $searchText)
 * @method static Builder|Human withRelatives()
 * @method static Builder|Human pets()
 * @method static Builder|Human findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static Builder|Human newModelQuery()
 * @method static Builder|Human newQuery()
 * @mixin \Eloquent
 */
class Human extends Profile implements HasMedia
{
    use HasFactory, Sluggable, InteractsWithMedia;

    public const MALE = 'male';
    public const FEMALE = 'female';

    public const AVATAR_PATH = 'uploads/profiles/avatar';
    public const DOCUMENTS_PATH = 'uploads/profiles/document';
    public const GALLERY_PATH = 'uploads/profiles/gallery';

    protected $fillable = [
        'cemetery_id',
        'user_id',
        'first_name',
        'last_name',
        'patronymic',
        'avatar',
        'description',
        'gender',
        'date_birth',
        'date_death',
        'birth_place',
        'burial_place',
        'latitude',
        'longitude',
        'death_reason',
        'death_certificate',
        'religious_view_id',
        'hobby_id',
        'status',
        'moderators_comment',
        'access',
        'spouse_id',
        'child_id',
        'user_id',
        'mother_id',
        'father_id',
        'published_at',
        'religious_id',
        'profile_images'
    ];

    protected $appends = ['fullName', 'yearBirth', 'yearDeath'];


    public static function updateChildForParent(int $parentId, int $childId): void
    {
        self::where('id', $parentId)
            ->update(['child_id' => $childId]);
    }

    public static function updateSpouse(int $parentId, int $currentId): void
    {
        self::where('id', $parentId)
            ->update(['spouse_id' => $currentId]);
    }

    public static function genderList(): array
    {
        return [
            'male' => self::MALE,
            'female' => self::FEMALE
        ];
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }

    public function scopeBySearch(Builder $query, string $searchText): Builder
    {
        return $query->select(['first_name', 'last_name', 'slug', 'avatar', 'date_birth', 'date_death'])->where(
            \DB::raw('CONCAT_WS(" ", humans.first_name, " ", humans.last_name)'),
            'LIKE', "%$searchText%");
    }

    public function scopeFiltered(Builder $query): Builder
    {
        return $query->when($value = request('FIO'), function (Builder $q) use ($value) {
            $q->where(\DB::raw('CONCAT_WS(" ",profiles.first_name, " ", profiles.last_name, " ", profiles.patronymic)'), 'LIKE', "%$value%");
        })->when($value = request('BIRTH'), function (Builder $q) use ($value) {
            $q->whereBetween(\DB::raw('YEAR(date_birth)'), explode('-', $value));
        })->when($value = request('DEATH'), function (Builder $query) use ($value) {
            $query->whereBetween(\DB::raw('YEAR(date_death)'), explode('-', $value));
        });
    }

    public function scopeByUser(Builder $query, int $userId): Builder
    {
        return $query->select(['id', 'first_name', 'last_name', 'slug', 'avatar', 'date_birth', 'date_death'])
            ->where('user_id', $userId);
    }

    public function scopeWithRelatives(Builder $query): Builder
    {
        return $query->has('father')->orHas('mother')
            ->orHas('child')->orHas('spouse');
    }

    public function scopePets(Builder $query): Builder
    {
        return $query->where('gender', 'pet');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['first_name', 'last_name'],
            ]
        ];
    }

    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class, '');
    }

    public function users(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'user_id');
    }

    public function owners(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'available_human_user')
            ->withPivot('status');
    }

    public function hobbies(): BelongsToMany
    {
        return $this->belongsToMany(Hobby::class);
    }

    public function religions(): BelongsTo
    {
        return $this->belongsTo(Religion::class, 'religious_id');
    }

    public function cemeteries(): BelongsTo
    {
        return $this->belongsTo(Cemetery::class, 'cemetery_id');
    }

    public function spouse(): BelongsTo
    {
        return self::belongsTo(static::class);
    }

    public function father(): BelongsTo
    {
        return self::belongsTo(static::class);
    }

    public function mother(): BelongsTo
    {
        return self::belongsTo(static::class);
    }

    public function child(): BelongsTo
    {
        return self::belongsTo(static::class);
    }
}
