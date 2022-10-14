<?php


namespace App\Services\Auth;


use App\Models\User\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;

class NetworkService
{
    /**
     * @throws \Throwable
     */
    public function auth(string $network, \Laravel\Socialite\Contracts\User $data)
    {
        if ($user = User::byNetwork($network, $data->getId())->first()) {
            return $user;
        }

        if ($data->getEmail() && $user = User::where('email', $data->getEmail())->exists()) {
            throw new \DomainException('User with this email already exists');
        }

        $user = DB::transaction(function () use ($network, $data) {
            return User::registerByNetwork($data->getName(), $data->getEmail(), $network, $data->getId());
        });


        event(new Registered($user));

        return $user;
    }
}
