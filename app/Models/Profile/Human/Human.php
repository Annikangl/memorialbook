<?php

namespace App\Models\Profile\Human;

use App\Models\Cemetery\Cemetery;
use App\Models\Profile\Base\Profile;
use App\Models\Profile\FamilyBurial;
use App\Models\Profile\Hobby;
use App\Models\Profile\Religion;
use App\Models\User\User;
use Carbon\Carbon;
use Eloquent;
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
 * @property int $id
 * @property int $user_id
 * @property int|null $father_id
 * @property int|null $mother_id
 * @property int|null $children_id
 * @property int|null $spouse_id
 * @property int|null $religion_id
 * @property int|null $cemetery_id
 * @property int|null $family_burial_id
 * @property string $first_name
 * @property string $last_name
 * @property string $slug
 * @property string $description
 * @property string|null $gender
 * @property string|null $date_birth
 * @property string|null $date_death
 * @property string|null $birth_place
 * @property string|null $burial_place
 * @property string|null $death_reason
 * @property float|null $latitude
 * @property float|null $longitude
 * @property string $status
 * @property string|null $moderators_comment
 * @property string|null $access
 * @property Carbon|null $published_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $life_expectancy
 *
 * @method static Builder|Human filtered()
 * @method static Builder|Human query()

 * @property-read Human|null $child
 * @property-read Human|null $father
 * @property-read Human|null $mother
 * @property-read Human|null $spouse
 * @method static Builder|Human active()
 * @method static Builder|Human byUser(int $userId)
 * @method static Builder|Collection bySearch(string $searchText)
 * @method static Builder|Human pets()

 * @mixin Eloquent
 */
class Human extends Profile implements HasMedia
{
    use HasFactory, Sluggable, InteractsWithMedia;

    public const MALE = 'male';
    public const FEMALE = 'female';

    public const ACCESS_PUBLIC = 'public';
    public const ACCESS_PRIVATE = 'private';
    public const ACCESS_AVAILABLE = 'available';


    protected $fillable = [
        'cemetery_id',
        'user_id',
        'spouse_id',
        'child_id',
        'user_id',
        'mother_id',
        'father_id',
        'religion_id',
        'family_burial_id',
        'first_name',
        'last_name',
        'description',
        'gender',
        'date_birth',
        'date_death',
        'birth_place',
        'burial_place',
        'latitude',
        'longitude',
        'death_reason',
        'status',
        'moderators_comment',
        'access',
        'published_at',
    ];

    protected $appends = ['fullName', 'yearBirth', 'yearDeath'];


    public static function updateChildForParent(int $parentId, int $childId): void
    {
        self::where('id', $parentId)
            ->update(['children_id' => $childId]);
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
        return $query->select(['id', 'first_name', 'last_name', 'slug', 'date_birth', 'date_death'])->where(
            \DB::raw('CONCAT_WS(" ", humans.first_name, " ", humans.last_name)'),
            'LIKE', "%$searchText%");
    }

    public function scopeFiltered(Builder $query): Builder
    {
        return $query->when($value = request('full_name'), function (Builder $q) use ($value) {
            $q->where(\DB::raw('CONCAT_WS(" ",humans.first_name, " ", humans.last_name, " ", humans.patronymic)'), 'LIKE', "%$value%");
        })->when($value = request('birth_date'), function (Builder $q) use ($value) {
            $q->whereBetween(\DB::raw('YEAR(date_birth)'), explode('-', $value));
        })->when($value = request('death_date'), function (Builder $query) use ($value) {
            $query->whereBetween(\DB::raw('YEAR(date_death)'), explode('-', $value));
        });
    }

    public function scopeByUser(Builder $query, int $userId): Builder
    {
        return $query->select(['id', 'first_name', 'last_name', 'slug', 'date_birth', 'date_death'])
            ->where('user_id', $userId);
    }

    public function scopeWithRelatives(Builder $query): Builder
    {
        return $query->has('father')->orHas('mother')
            ->orHas('children')->orHas('spouse');
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

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatars')
            ->singleFile()
            ->useFallbackUrl(asset('assets/media/media/empty_profile_avatar.png'))
            ->useFallbackPath(asset('assets/media/media/empty_profile_avatar.png'));

        $this->addMediaCollection('gallery');

        $this->addMediaCollection('attached_document')
            ->singleFile();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(150)
            ->height(150)
            ->nonQueued();

        $this->addMediaConversion('thumb_500')
            ->performOnCollections('gallery')
            ->width(500)
            ->height(550)
            ->nonQueued();
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

    public function children(): BelongsTo
    {
        return self::belongsTo(static::class);
    }

    public function familyBurial(): BelongsTo
    {
        return $this->belongsTo(FamilyBurial::class);
    }
}
