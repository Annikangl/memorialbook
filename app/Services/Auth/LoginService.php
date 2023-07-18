<?php

namespace App\Services\Auth;

use App\Exceptions\Api\Auth\LoginException;
use App\Models\User\User;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    /**
     * @throws LoginException
     */
    public function login(array $credentials, string $fcmToken, string $deviceName): User
    {
        if (!Auth::attempt($credentials)) {
            throw new LoginException('Invalid login or password');
        }

        $user = Auth::user();

        $user->updateFcmToken($fcmToken);
        $user->updateDeviceName($deviceName);

        return $user;
    }
}
