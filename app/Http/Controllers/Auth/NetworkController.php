<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\NetworkService;
use Laravel\Socialite\Facades\Socialite;

class NetworkController extends Controller
{
    private NetworkService $service;

    public function __construct(NetworkService $service)
    {
        $this->service = $service;
    }

    public function redirect(string $network)
    {
        return Socialite::driver($network)->redirect();
    }

    public function callback(string $network)
    {
        $data = Socialite::driver($network)->user();

        try {
            $user = $this->service->auth($network, $data);
            \Auth::login($user);
            return redirect()->route('home');
        } catch (\DomainException $exception) {
            return redirect()->route('login')->with('error', $exception->getMessage());
        }
    }
}
