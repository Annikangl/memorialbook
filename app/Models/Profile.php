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
 * @property string $name
 * @property string|null $patronymic
 * @property string|null $surname
 * @property string|null $avatar
 * @property string $date_birth
 * @property string $place_birth
 * @property string $date_death
 * @property string|null $burial_place
 * @property string|null $reason_death
 * @property string|null $death_certificate
 * @property string|null $religious_views
 * @property string|null $hobby
 * @property int|null $id_father
 * @property int|null $id_mother
 * @property int|null $id_spouse
 * @property int|null $moderation_status
 * @property string|null $moderators_comment
 * @property string|null $setting_access
 * @property string|null $gender
 * @property int|null $p_id
 * @property int|null $m_id
 * @property int|null $f_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|Profile filtered()
 * @method static Builder|Profile newModelQuery()
 * @method static Builder|Profile newQuery()
 * @method static Builder|Profile query()
 * @method static Builder|Profile whereAvatar($value)
 * @method static Builder|Profile whereBurialPlace($value)
 * @method static Builder|Profile whereCreatedAt($value)
 * @method static Builder|Profile whereDateBirth($value)
 * @method static Builder|Profile whereDateDeath($value)
 * @method static Builder|Profile whereDeathCertificate($value)
 * @method static Builder|Profile whereFId($value)
 * @method static Builder|Profile whereGender($value)
 * @method static Builder|Profile whereHobby($value)
 * @method static Builder|Profile whereId($value)
 * @method static Builder|Profile whereIdFather($value)
 * @method static Builder|Profile whereIdMother($value)
 * @method static Builder|Profile whereIdSpouse($value)
 * @method static Builder|Profile whereMId($value)
 * @method static Builder|Profile whereModerationStatus($value)
 * @method static Builder|Profile whereModeratorsComment($value)
 * @method static Builder|Profile whereName($value)
 * @method static Builder|Profile wherePId($value)
 * @method static Builder|Profile wherePatronymic($value)
 * @method static Builder|Profile wherePlaceBirth($value)
 * @method static Builder|Profile whereReasonDeath($value)
 * @method static Builder|Profile whereReligiousViews($value)
 * @method static Builder|Profile whereSettingAccess($value)
 * @method static Builder|Profile whereSurname($value)
 * @method static Builder|Profile whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    protected $fillable = [
        'name', 'patronymic', 'surname', 'avatar',
        'date_birth', 'place_birth', 'date_death',
        'burial_place', 'reason_death', 'death_certificate',
        'religious_views', 'hobby', 'image_video_gallery',
        'id_father', 'id_mother', 'id_spouse',
        'moderation_status', 'moderators_comment', 'setting_access',
        'gender', 'p_id', 'm_id', 'f_id'
    ];

    public function scopeFiltered(Builder $query)
    {
        return $query->when($value = request('FIO'), function (Builder $q) use ($value) {
            return $q->where('name', 'LIKE', "%$value%");
        })->when(request('BIRTH'), function (Builder $q) {
           return $q->whereBetween('YEAR(date_birth)', explode('-', request('BIRTH')));
        });
    }

    public function getFullNameAttribute(): string
    {
        return "{$this->surname} {$this->name} {$this->patronymic}";
    }

    public function dateBirth(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Carbon::createFromFormat("Y-m-d", $value)->year
        );
    }

    public function dateDeath(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Carbon::createFromFormat('Y-m-d', $value)->year
        );
    }
}
