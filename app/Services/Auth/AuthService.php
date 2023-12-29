<?php

namespace App\Services\Auth;

use App\DTOs\User\UserDTO;
use App\Exceptions\Api\Auth\LoginException;
use App\Exceptions\Api\Auth\PasswordException;
use App\Exceptions\Api\Auth\RegisterException;
use App\Models\User\User;
use App\Models\VerificationCode;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    /**
     * @throws RegisterException
     */
    public function register(UserDTO $userDTO): User
    {
        /** @var User $user */

        $user = User::query()->create([
            'username' => $userDTO->username,
            'email' => $userDTO->email,
            'phone' => $userDTO->phone,
            'password' => bcrypt($userDTO->password),
            'fcm_token' => $userDTO->fcm_token,
            'device_name' => $userDTO->device_name,
            'location' => $userDTO->location
        ]);

        if (!$user->exists()) {
            throw new RegisterException('Failed create user');
        }

        return $user;
    }

    /**
     * @throws LoginException
     */
    public function login(array $credentials, ?string $fcmToken, ?string $deviceName): User
    {
        if (!Auth::attempt($credentials)) {
            throw new LoginException('Invalid login or password', 401);
        }

        $user = Auth::user();

        if ($deviceName) {
            $user->updateDeviceName($deviceName);
        }

        if ($fcmToken) {
            $user->updateFcmToken($fcmToken);
        }

        return $user;
    }

    public function logout(User $user): void
    {
        $user->tokens()->delete();
        $user->fcm_token = null;

        $user->save();
    }

    /**
     * @param string $email
     * @param string $newPassword
     * @throws PasswordException
     */
    public function recoverPassword(string $email, string $newPassword): void
    {
        $user = User::query()->where('email', $email)->first();

        if (!$user) {
            throw new ModelNotFoundException('User not found', 404);
        }

        if (Hash::check($newPassword, $user->password)) {
            throw new PasswordException('The new password must not be equal to the old password', 422);
        }

        $user->password = bcrypt($newPassword);
        $user->save();

        VerificationCode::clearVerificationCode($user->email);
    }
}
