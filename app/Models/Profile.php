<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


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
 * @method static Builder|Profile newModelQuery()
 * @method static Builder|Profile newQuery()
 * @method static Builder|Profile query()
 * @method static Builder|Profile whereAccess($value)
 * @method static Builder|Profile whereAvatar($value)
 * @method static Builder|Profile whereBirthPlace($value)
 * @method static Builder|Profile whereBurialPlace($value)
 * @method static Builder|Profile whereCreatedAt($value)
 * @method static Builder|Profile whereDateBirth($value)
 * @method static Builder|Profile whereDateDeath($value)
 * @method static Builder|Profile whereDeathCertificate($value)
 * @method static Builder|Profile whereFId($value)
 * @method static Builder|Profile whereFirstName($value)
 * @method static Builder|Profile whereGender($value)
 * @method static Builder|Profile whereHobby($value)
 * @method static Builder|Profile whereId($value)
 * @method static Builder|Profile whereLastName($value)
 * @method static Builder|Profile whereMId($value)
 * @method static Builder|Profile whereModeratorsComment($value)
 * @method static Builder|Profile wherePId($value)
 * @method static Builder|Profile wherePatronymic($value)
 * @method static Builder|Profile wherePublishedAt($value)
 * @method static Builder|Profile whereReasonDeath($value)
 * @method static Builder|Profile whereReligiousViews($value)
 * @method static Builder|Profile whereSlug($value)
 * @method static Builder|Profile whereStatus($value)
 * @method static Builder|Profile whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Profile extends Model
{
    use HasFactory;

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
        'reason_death',
        'death_certificate',
        'religious_views',
        'hobby',
        'status',
        'moderators_comment',
        'access',
        'p_id',
        'm_id',
        'f_id',
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

    public function scopeFiltered(Builder $query)
    {
        return $query->when($value = request('FIO'), function (Builder $q) use ($value) {
            return $q->where('name', 'LIKE', "%$value%");
        })->when(request('BIRTH'), function (Builder $q) {
            return $q->whereBetween('YEAR(date_birth)', explode('-', request('BIRTH')));
        });
    }

    public function fullName(): Attribute
    {
        return new Attribute(
            get: fn () => "{$this->first_name} {$this->last_name} {$this->patronymic}"
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

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Profile $profile) {
            $profile->slug = $profile->slug ?? str($profile->first_name . $profile->last_name)->slug();
        });
    }
}
