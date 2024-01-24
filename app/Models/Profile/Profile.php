<?php

namespace App\Models\Profile;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * Class Profile
 * @package App\Models\Profile\Base
 *
 * @property string $status
 * @property bool $is_celebrity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Profile extends Model implements HasMedia
{
    use InteractsWithMedia;

    public const STATUS_DRAFT = 'draft';
    public const STATUS_MODERATION = 'moderation';
    public const STATUS_ACTIVE = 'active';
    public const STATUS_CLOSED = 'closed';
    public const STATUS_REJECTED = 'rejected';

    public const ACCESS_PUBLIC = 'public';
    public const ACCESS_PRIVATE = 'private';
    public const ACCESS_AVAILABLE = 'available';


    public static function statusList(): array
    {
        return [
            'active' => self::STATUS_ACTIVE,
            'draft' => self::STATUS_DRAFT,
            'rejected' => self::STATUS_REJECTED,
            'moderation' => self::STATUS_MODERATION,
            'closed' => self::STATUS_CLOSED
        ];
    }

    public static function getAccessList(): array
    {
        return [
            'public' => self::ACCESS_PUBLIC,
            'available' => self::ACCESS_AVAILABLE,
            'private' => self::ACCESS_PRIVATE
        ];
    }

    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function isDraft(): bool
    {
        return $this->status === self::STATUS_DRAFT;
    }

    public function isClosed(): bool
    {
        return $this->status === self::STATUS_CLOSED;
    }

    public function isRejected(): bool
    {
        return $this->status === self::STATUS_REJECTED;
    }

    public function getYearBirthAttribute(): string
    {
        return Carbon::parse($this->date_birth)->year;
    }

    public function getYearDeathAttribute(): string
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
            get: fn($value) => Carbon::createFromFormat('Y-m-d', $value)->format('d.m.Y'),
            set: fn($value) => Carbon::parse($value)->format('Y-m-d'),
        );
    }

    protected function dateDeath(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Carbon::createFromFormat('Y-m-d', $value)->format('d.m.Y'),
            set: fn($value) => Carbon::parse($value)->format('Y-m-d'),
        );
    }

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_CROP, 150, 150)
            ->nonQueued();
    }

    public function getGallery(): array
    {
        $gallery = [];

        $this->getMedia('gallery')->each(function (Media $item) use (&$gallery) {
            $gallery[] = $item->getUrl('thumb_500');
        });

        return $gallery;
    }
}
