<?php

namespace App\Models\Profile;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


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
 * @property string|null $religious_views
 * @property string|null $hobby
 * @property string $status
 * @property string|null $moderators_comment
 * @property string|null $access
 * @property int|null $p_id
 * @property int|null $m_id
 * @property int|null $f_id
 * @property string|null $published_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $full_name
 * @method static \Database\Factories\ProfileFactory factory(...$parameters)
 * @method static Builder|Profile filtered()
 * @method static Builder|Profile query()

 */
class Profile extends Model
{
    use HasFactory, Sluggable;

    public const STATUS_DRAFT = 'Черновик';
    public const STATUS_MODERATION = 'На модерации';
    public const STATUS_ACTIVE = 'Опубликован';
    public const STATUS_CLOSED = 'Закрыт';

    protected $guarded = [
        '_token'
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'patronymic',
        'avatar',
        'gender',
        'date_birth',
        'date_death',
        'birth_place',
        'burial_place',
        'latitude',
        'longitude',
        'reason_death',
        'death_certificate',
        'religious_views',
        'hobby',
        'status',
        'moderators_comment',
        'access',
        'parent_id',
        'mother_id',
        'father_id',
        'published_at'
    ];

    public static function statusList(): array
    {
        return [
            'Опубликован' => self::STATUS_ACTIVE,
            'Черновик' => self::STATUS_DRAFT,
            'Закрыт' => self::STATUS_CLOSED,
            'На модерации' => self::STATUS_MODERATION
        ];
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

    public function fullName(): Attribute
    {
        return new Attribute(
            get: fn () => "{$this->first_name} {$this->last_name} {$this->patronymic}"
        );
    }

    public function hobbies(): Attribute
    {
        return new Attribute(
            get: fn() => $this->hobby ? explode(' ', $this->hobby) : ''
        );
    }

    public function dateBirth(): Attribute
    {
        return new Attribute(
            get: fn($value) => Carbon::createFromFormat("Y-m-d", $value)->year
        );
    }

    public function dateDeath(): Attribute
    {
        return new Attribute(
            get: fn($value) => Carbon::createFromFormat('Y-m-d', $value)->year
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
        return $this->hasMany(Gallery::class);
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
}
