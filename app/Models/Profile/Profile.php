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

    public function getYearBirthAttribute(): ?string
    {
        return $this->date_birth?->year;
    }

    public function getYearDeathAttribute(): ?string
    {
        return $this->date_death?->year;
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
            set: fn($value) => Carbon::parse($value)->format('Y-m-d'),
        );
    }

    protected function dateDeath(): Attribute
    {
        return Attribute::make(
            set: fn($value) => Carbon::parse($value)->format('Y-m-d'),
        );
    }

    public function getGallery(): array
    {
        $gallery = [];

        $this->getMedia('gallery')->each(function (Media $item) use (&$gallery) {
            $gallery[] = $item->getUrl('thumb_500');
        });

        return $gallery;
    }

    public function getCustomGallery(): array
    {
        $gallery = [];

        $this->getMedia('gallery')->each(function (Media $item) use (&$gallery) {
            $path = $item->getOriginal('id');
            $gallery[] = '/'.$path.'/'.$item->getAttribute('file_name');
        });

        return $gallery;
    }
    public function getCustomDocument()
    {
        $this->getMedia('attached_document')->each(function (Media $item) use (&$document) {
            $path = $item->getOriginal('id');
            $document= '/'.$path.'/'.$item->getAttribute('file_name');
        });
        return $document;
    }
    public function getCustomAvatar()
    {
        $this->getMedia('avatars')->each(function (Media $item) use (&$document) {
            $path = $item->getOriginal('id');
            $document= '/'.$path.'/'.$item->getAttribute('file_name');
        });
        return $document;
    }
    public function getCustomBanner()
    {
        $this->getMedia('banners')->each(function (Media $item) use (&$banner) {
            $path = $item->getOriginal('id');
            $banner= '/'.$path.'/'.$item->getAttribute('file_name');
        });
        return $banner;
    }
}
