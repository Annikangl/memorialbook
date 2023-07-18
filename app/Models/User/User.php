<?php

namespace App\Models\User;

use App\Models\Community\Community;
use App\Models\News\News;
use App\Models\Profile\Human\Human;
use App\Models\Profile\Pet\Pet;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
 */
class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, Sluggable, InteractsWithMedia;

    protected $fillable = [
        'username',
        'email',
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
    ];

    public static function register(string $name, string $email, string $phone, string $password): self
    {
        return static::create([
            'username' => $name,
            'email' => $email,
            'phone' => $phone,
            'password' => Hash::make($password),
        ]);
    }

    public static function registerByNetwork(string $name, string $email, string $network, string $identity): self
    {
        $user = static::create([
            'username' => $name,
            'email' => $email,
            'password' => null
        ]);


        $user->networks()->create([
            'network' => $network,
            'identity' => $identity
        ]);

        return $user;
    }

    public function createAuthToken(): string
    {
        return $this->createToken($this->device_name)->plainTextToken;
    }

    public function updateFcmToken(string $token): void
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

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'username',
            ]
        ];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')
            ->singleFile()
            ->useFallbackUrl(asset('assets/media/media/empty_user_avatar.webp'))
            ->useFallbackPath(asset('assets/media/media/empty_user_avatar.webp'));
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->nonQueued();
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

    public function news(): HasMany
    {
        return $this->hasMany(News::class, 'author_id');
    }

    public function communities(): BelongsToMany
    {
        return $this->belongsToMany(Community::class);
    }
}
