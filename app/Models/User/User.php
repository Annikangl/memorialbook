<?php

namespace App\Models\User;

use App\Models\News\News;
use App\Models\Profile\Profile;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;


/**
 * App\Models\User\User
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $phone
 * @property string|null $avatar
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User\Network[] $networks
 * @property-read int|null $networks_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static Builder|User byNetwork(string $network, string $identity)
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereAvatar($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User wherePhone($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static Builder|User whereUsername($value)
 * @method static \Database\Factories\User\UserFactory factory(...$parameters)
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'phone',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function networks(): HasMany
    {
        return $this->hasMany(Network::class);
    }

    public function profiles(): HasMany
    {
        return $this->hasMany(Profile::class);
    }

    public function news(): HasMany
    {
        return $this->hasMany(News::class,'author_id');
    }

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

    public function scopeByNetwork(Builder $query, string $network, string $identity)
    {
        return $query->whereHas('networks', function (Builder $query) use ($network, $identity) {
            $query->where('network', $network)->where('identity', $identity);
        });
    }
}
