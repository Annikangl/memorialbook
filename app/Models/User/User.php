<?php

namespace App\Models\User;

use App\Enums\UserRole;
use App\Models\Community\Community;
use App\Models\Event\Event;
use App\Models\News\News;
use App\Models\Profile\Cemetery\Cemetery;
use App\Models\Profile\Human\Human;
use App\Models\Profile\Pet\Pet;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


/**
 * App\Models\User\User
 *
 * @property int $id
 * @property string $slug
 * @property string $username
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $phone
 * @property string $password
 * @property string $fcm_token
 * @property string $device_name
 * @property string $location
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 *
 * @property int $createdProfilesCount
 *
 * @method static BelongsToMany subscribedCommunities()
 */
class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, Sluggable, InteractsWithMedia;

    protected $fillable = [
        'username',
        'email',
        'role',
        'phone',
        'password',
        'fcm_token',
        'device_name',
        'location',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'role' => UserRole::class
    ];

    public function createAuthToken(): string
    {
        return $this->createToken($this->device_name)->plainTextToken;
    }

    public function updateFcmToken(?string $token): void
    {
        if ($this->fcm_token !== $token) {
            $this->fcm_token = $token;
            $this->save();
        }
    }

    public function updateDeviceName(string $deviceName): void
    {
        if ($this->device_name !== $deviceName) {
            $this->device_name = $deviceName;
            $this->save();
        }
    }

    public function scopeByNetwork(Builder $query, string $network, string $identity): Builder
    {
        return $query->whereHas('networks', function (Builder $query) use ($network, $identity) {
            $query->where('network', $network)->where('identity', $identity);
        });
    }

    protected function shortName(): Attribute
    {
        return Attribute::make(
            get: fn() => strstr($this->username, ' ', true)
        );
    }

    public function getCreatedProfilesCountAttribute(): int
    {
        return $this->humans->count() + $this->pets->count();
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'username',
            ]
        ];
    }

    public function isCommunityOwner(Community $community): bool
    {
        return $this->communities->contains($community);
    }


    public function networks(): HasMany
    {
        return $this->hasMany(Network::class);
    }

    public function humans(): HasMany
    {
        return $this->hasMany(Human::class);
    }

    public function pets(): HasMany
    {
        return $this->hasMany(Pet::class);
    }

    public function availableProfiles(): BelongsToMany
    {
        return $this->belongsToMany(Human::class, 'available_human_user')
            ->withPivot('status', 'created_at');
    }

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class);
    }

    public function news(): HasMany
    {
        return $this->hasMany(News::class, 'author_id');
    }

    public function communities(): HasMany
    {
        return $this->hasMany(Community::class, 'owner_id');
    }

    public function cemeteries(): HasMany
    {
        return $this->hasMany(Cemetery::class, 'user_id');
    }

    public function subscribedCommunities(): BelongsToMany
    {
        return $this->belongsToMany(Community::class, 'community_users');
    }

    public function subscribedCemeteries(): BelongsToMany
    {
        return $this->belongsToMany(Cemetery::class,'cemetery_subscribers')->withTimestamps();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatars')
            ->singleFile()
            ->useFallbackUrl(asset('assets/media/media/empty_user_avatar.webp'))
            ->useFallbackPath(asset('assets/media/media/empty_user_avatar.webp'));
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(300)
            ->nonQueued();
    }
}
