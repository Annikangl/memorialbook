<?php

namespace App\Services\Auth;

use App\DTOs\User\UserDTO;
use App\Exceptions\Api\Auth\RegisterException;
use App\Models\User\User;

class RegisterService
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
}
