<?php


namespace App\Models\Profile\Base;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * Class Profile
 * @package App\Models\Profile\Base
 *
 * @property int $id
 * @property string $first_name
 * @property string|null $last_name
 * @property string|null $patronymic
 * @property string $slug
 * @property string|null $avatar
 * @property string $date_birth
 * @property string $date_death
 * @property-read string $full_name
 * @property string|null $description
 * @property string|null $death_reason
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Profile extends Model implements HasMedia
{
    use InteractsWithMedia;

    public const STATUS_DRAFT = 'Черновик';
    public const STATUS_MODERATION = 'На модерации';
    public const STATUS_ACTIVE = 'Опубликован';
    public const STATUS_CLOSED = 'Отклонен';

    public const EMPTY_AVATAR_PATH = 'uploads/profiles/avatar/empty_profile_avatar.png';
    public const AVATAR_PATH = 'uploads/profiles/avatar';
    public const DOCUMENTS_PATH = 'uploads/profiles/document';
    public const GALLERY_PATH = 'uploads/profiles/gallery';


    public static function statusList(): array
    {
        return [
            'Опубликован' => self::STATUS_ACTIVE,
            'Черновик' => self::STATUS_DRAFT,
            'Отклонен' => self::STATUS_CLOSED,
            'На модерации' => self::STATUS_MODERATION
        ];
    }

    public function isDraft(): bool
    {
        return $this->status === self::STATUS_DRAFT;
    }

    public function isClosed(): bool
    {
        return $this->status === self::STATUS_CLOSED;
    }

    public function getFullNameAttribute(): string
    {
        return  "{$this->first_name} {$this->last_name}";
    }

    public function getYearBirthAttribute(): int
    {
        return Carbon::parse($this->date_birth)->year;
    }

    public function getYearDeathAttribute(): int
    {
        return Carbon::parse($this->date_death)->year;
    }

    protected function lifeExpectancy(): ?Attribute
    {
        return new Attribute(
            get: fn() => Carbon::make($this->date_birth)?->format('d.m.Y') . ' - ' .
                Carbon::make($this->date_death)?->format('d.m.Y')
        );
    }

    protected function fullName(): Attribute
    {
        return new Attribute(
            get: fn() => "{$this->first_name} {$this->last_name}"
        );
    }

    protected function yearBirth(): Attribute
    {
        return new Attribute(
            get: fn() => Carbon::parse($this->date_birth)->year
        );
    }

    protected function yearDeath(): Attribute
    {
        return new Attribute(
            get: fn() => Carbon::parse($this->date_death)->year
        );
    }

    protected function dateBirth(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('d.m.Y'),
            set: fn ($value) => Carbon::parse($value)->format('Y-m-d'),
        );
    }

    protected function dateDeath(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('d.m.Y'),
            set: fn ($value) => Carbon::parse($value)->format('Y-m-d'),
        );
    }

    /**
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_CROP, 150, 150)
            ->nonQueued();
    }
}
