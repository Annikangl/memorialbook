<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Exceptions\Api\TokenException;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $this->credentials($request);

        if (!Auth::attempt($credentials)) {
            return response()->json(['status' => false, 'message' => 'Invalid login or password'])->setStatusCode(401);
        }

        $token = Auth::user()->createToken($request->get('device'))->plainTextToken;


        return response()->json(['status' => true, 'token' => $token, 'user' => new UserResource(Auth::user())], 200);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();

        return response()->json(['status' => true, 'message' => 'User logged out'], 200);
    }

    protected function credentials(Request $request): array
    {
        return [
            'email' => $request->get('login_email'),
            'password' => $request->get('login_password'),
        ];
    }
}
