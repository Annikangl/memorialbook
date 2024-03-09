<?php

namespace App\Services\Auth;

use App\DTOs\User\UserDTO;
use App\Enums\UserRole;
use App\Exceptions\Api\Auth\RegisterException;
use App\Models\User\User;
use Illuminate\Http\Response;

class RegisterService
{
    /**
     * Register a  user with role USER
     * @param UserDTO $userDTO
     * @return User
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
            'location' => $userDTO->location,
            'role' => UserRole::ROLE_USER,
        ]);

        if (!$user->exists()) {
            throw new RegisterException('Failed create user', Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $user;
    }

    /**
     * Register a user with role SELLER
     * @param UserDTO $userDTO
     * @return User
     * @throws RegisterException
     */
    public function registerSeller(UserDTO $userDTO): User
    {
        $user = User::query()->create([
            'username' => $userDTO->username,
            'email' => $userDTO->email,
            'phone' => $userDTO->phone,
            'password' => bcrypt($userDTO->password),
            'fcm_token' => $userDTO->fcm_token,
            'device_name' => $userDTO->device_name,
            'location' => $userDTO->location,
            'role' => UserRole::ROLE_SELLER,
        ]);

        if (!$user->exists()) {
            throw new RegisterException('Failed create user', Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $user;
    }
}
