<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'code',
        'expired_at',
        'created_at',
    ];

    public static function checkVerificationCode(string $email, string $code): bool
    {
        return VerificationCode::query()->where('email', $email)
            ->where('code', $code)
            ->exists();
    }

    /**
     * @throws Exception
     */
    public static function createVerificationCode(string $email): self
    {
        return self::query()->create([
            'email' => $email,
            'code' => random_int(1000,9999),
            'expired_at' => now()->addMinutes(10)
        ]);
    }

    public static function clearVerificationCode(string $email): void
    {
        $verificationCode = self::query()->where('email', $email)->firstOrFail();
        $verificationCode->delete();
    }
}
