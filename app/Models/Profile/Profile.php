<?php

namespace App\Models\Profile;

use App\Models\Cemetery\Cemetery;
use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
 * App\Models\Profile
 *
 * @property int $id
 * @property string $first_name
 * @property string|null $last_name
 * @property string|null $patronymic
 * @property string $slug
 * @property string|null $gender
 * @property string|null $avatar
 * @property string $date_birth
 * @property string $date_death
 * @property string|null $birth_place
 * @property string|null $burial_place
 * @property string|null $reason_death
 * @property string|null $death_certificate
 * @property string $status
 * @property string|null $moderators_comment
 * @property string|null $access
 * @property int|null $father_id
 * @property int|null $mother_id
 * @property int|null $child_id
 * @property int|null $spouse_id
 * @property string|null $published_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $full_name
 * @method static \Database\Factories\Profile\ProfileFactory factory(...$parameters)
 * @method static Builder|Profile filtered()
 * @method static Builder|Profile query()
 * @property string|null $description
 * @property float|null $latitude
 * @property float|null $longitude
 * @property string|null $death_reason
 * @property-read Profile|null $child
 * @property-read Profile|null $father
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Profile\Gallery[] $galleries
 * @property-read int|null $galleries_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Profile\Hobby[] $hobbies
 * @property-read int|null $hobbies_count
 * @property-read Profile|null $mother
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Profile\Religion[] $religions
 * @property-read int|null $religions_count
 * @property-read Profile|null $spouse
 * @method static Builder|Profile active()
 * @method static Builder|Profile findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static Builder|Profile newModelQuery()
 * @method static Builder|Profile newQuery()
 * @method static Builder|Profile whereAccess($value)
 * @method static Builder|Profile whereAvatar($value)
 * @method static Builder|Profile whereBirthPlace($value)
 * @method static Builder|Profile whereBurialPlace($value)
 * @method static Builder|Profile whereChildId($value)
 * @method static Builder|Profile whereCreatedAt($value)
 * @method static Builder|Profile whereDateBirth($value)
 * @method static Builder|Profile whereDateDeath($value)
 * @method static Builder|Profile whereDeathCertificate($value)
 * @method static Builder|Profile whereDeathReason($value)
 * @method static Builder|Profile whereDescription($value)
 * @method static Builder|Profile whereFatherId($value)
 * @method static Builder|Profile whereFirstName($value)
 * @method static Builder|Profile whereGender($value)
 * @method static Builder|Profile whereId($value)
 * @method static Builder|Profile whereLastName($value)
 * @method static Builder|Profile whereLatitude($value)
 * @method static Builder|Profile whereLongitude($value)
 * @method static Builder|Profile whereModeratorsComment($value)
 * @method static Builder|Profile whereMotherId($value)
 * @method static Builder|Profile wherePatronymic($value)
 * @method static Builder|Profile wherePublishedAt($value)
 * @method static Builder|Profile whereSlug($value)
 * @method static Builder|Profile whereSpouseId($value)
 * @method static Builder|Profile whereStatus($value)
 * @method static Builder|Profile whereUpdatedAt($value)
 * @method static Builder|Profile withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 * @mixin \Eloquent
 */

class Profile extends Model implements HasMedia
{
    use HasFactory, Sluggable, InteractsWithMedia;

    public const STATUS_DRAFT = 'Черновик';
    public const STATUS_MODERATION = 'На модерации';
    public const STATUS_ACTIVE = 'Опубликован';
    public const STATUS_CLOSED = 'Закрыт';

    public const AVATAR_PATH = 'uploads/profiles/avatar';
    public const DOCUMENTS_PATH = 'uploads/profiles/document';
    public const GALLERY_PATH = 'uploads/profiles/gallery';

    protected $guarded = [
        '_token'
    ];

    protected $fillable = [
        'cemetery_id',
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
//        'burial_place_coords',

    ];

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

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_CROP, 150, 150)
            ->nonQueued();
    }

    public static function statusList(): array
    {
        return [
            'Опубликован' => self::STATUS_ACTIVE,
            'Черновик' => self::STATUS_DRAFT,
            'Закрыт' => self::STATUS_CLOSED,
            'На модерации' => self::STATUS_MODERATION
        ];
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }

    public function scopeFiltered(Builder $query): Builder
    {
        return $query->when($value = request('FIO'), function (Builder $q) use ($value) {
            $q->where(\DB::raw('CONCAT(profiles.first_name, " ", profiles.last_name, " ", profiles.patronymic)'), 'LIKE', "%$value%");
        })->when($value = request('BIRTH'), function (Builder $q) use ($value) {
            $q->whereBetween(\DB::raw('YEAR(date_birth)'), explode('-', $value));
        })->when($value = request('DEATH'), function (Builder $query) use ($value) {
            $query->whereBetween(\DB::raw('YEAR(date_death)'), explode('-', $value));
        });
    }

    protected function lifeExpectancy(): Attribute
    {
        return new Attribute(
            get: fn () => Carbon::make($this->date_birth)->format('d.m.Y') . ' - ' .
                Carbon::make($this->date_death)->format('d.m.Y')
        );
    }

    protected function fullName(): Attribute
    {
        return new Attribute(
            get: fn () => "{$this->first_name} {$this->last_name} {$this->patronymic}"
        );
    }

    protected function yearBirth(): Attribute
    {
        return new Attribute(
            get: fn() => Carbon::createFromFormat('Y-m-d', $this->date_birth)->year
        );
    }

    protected function yearDeath(): Attribute
    {
        return new Attribute(
            get: fn() => Carbon::createFromFormat('Y-m-d', $this->date_death)->year
        );
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
        return $this->hasMany(Gallery::class,'');
    }

    public function users(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'user_id');
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
