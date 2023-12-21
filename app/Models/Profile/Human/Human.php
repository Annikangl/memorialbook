<?php

namespace App\Models\Profile\Human;

use App\Models\Community\Community;
use App\Models\Profile\Burial;
use App\Models\Profile\Cemetery\Cemetery;
use App\Models\Profile\Pet\Pet;
use App\Models\Profile\Profile;
use App\Models\User\User;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Eloquent;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
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
 * @property string|null $religion
 * @property int|null $cemetery_id
 * @property int|null $family_burial_id
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property string $slug
 * @property string $description
 * @property string $hobbies
 * @property string|null $gender
 * @property string|null $date_birth
 * @property string|null $date_death
 * @property string|null $birth_place
 * @property string|null $burial_place
 * @property string|null $death_reason
 * @property array $burial_coords
 * @property string $status
 * @property boolean $is_celebrity
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
    use HasFactory, Sluggable, InteractsWithMedia, Filterable;

    public const MALE = 'male';
    public const FEMALE = 'female';

    protected $fillable = [
        'cemetery_id',
        'user_id',
        'spouse_id',
        'child_id',
        'user_id',
        'mother_id',
        'father_id',
        'religion',
        'burial_id',
        'is_celebrity',
        'first_name',
        'last_name',
        'middle_name',
        'description',
        'gender',
        'hobbies',
        'date_birth',
        'date_death',
        'birth_place',
        'burial_place',
        'burial_coords',
        'death_reason',
        'status',
        'is_celebrity',
        'moderators_comment',
        'access',
        'published_at',
    ];

    protected $appends = ['fullName', 'yearBirth', 'yearDeath'];

    protected $casts = [
        'is_celebrity' => 'boolean',
        'hobbies' => 'array',
        'burial_coords' => 'array'
    ];

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

    public function scopePets(Builder $query): Builder
    {
        return $query->where('gender', 'pet');
    }

    /**
     * Get count filtered items
     * @param array $filters
     * @return int
     */
    public static function getFilteredCount(array $filters): int
    {
        return self::query()->filter($filters)->count();
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['first_name', 'last_name'],
            ]
        ];
    }

    protected function fullName(): Attribute
    {
        return new Attribute(
            get: fn() => "{$this->first_name} {$this->last_name}"
        );
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
        return self::belongsTo(Human::class, 'father_id', 'id');
    }

    public function mother(): BelongsTo
    {
        return self::belongsTo(self::class, 'mother_id', 'id');
    }

    public function children(): BelongsTo
    {
        return self::belongsTo(self::class, 'children_id', 'id');
    }

    public function pets(): HasMany
    {
        return $this->hasMany(Pet::class,'owner_id');
    }

    public function communities(): BelongsToMany
    {
        return $this->belongsToMany(Community::class, 'community_profiles', 'profileable_id');
    }

    public function burial(): BelongsTo
    {
        return $this->belongsTo(Burial::class);
    }

    public function getBurialJson(): string
    {
        return json_encode(['lat' => $this->latitude, 'lng' => $this->longitude]);
    }

    public function scopeBySearch(Builder $query, string $searchText): Builder
    {
        return $query->select(['id', 'first_name', 'last_name', 'slug', 'date_birth', 'date_death'])->where(
            \DB::raw('CONCAT_WS(" ", humans.first_name, " ", humans.last_name)'),
            'LIKE', "%$searchText%");
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

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatars')
            ->singleFile()
            ->useFallbackUrl(asset('assets/media/media/empty_avatar.png'))
            ->useFallbackPath(asset('assets/media/media/empty_avatar.png'));


        $this->addMediaCollection('banners')
            ->useFallbackUrl(asset('assets/media/media/empty_banner.png'))
            ->useFallbackPath(asset('assets/media/media/empty_banner.png'))
            ->singleFile();

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
            ->performOnCollections('gallery', 'banners')
            ->width(500)
            ->height(550)
            ->nonQueued();
    }

}
