<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected string $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'registration_full_name' => ['required', 'string', 'max:255'],
            'registration_email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'registration_phone' => ['required', 'string', 'max:15', 'unique:users,phone'],
            'registration_password' => ['required', 'string', Password::default()],
            'registration_password_confirm' => ['required',' string', 'min:8']
        ]);
    }

    protected function create(array $data): User
    {
        return User::register($data['registration_full_name'], $data['registration_email'], $data['registration_phone'], $data['registration_password']);
    }
}
