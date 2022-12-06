<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $this->credentials($request);

        if (!Auth::attempt($credentials)) {
            return response()->json(['status' => false, 'message' => 'Invalid login or password'])->setStatusCode(401);
        }

        $token = Auth::user()->createToken('API token')->plainTextToken;

        return response()->json(['status' => true, 'token' => $token, 'user' => new UserResource(Auth::user())]);
    }

    protected function credentials(Request $request): array
    {
        return [
            'email' => $request->get('login-email'),
            'password' => $request->get('login-password')
        ];
    }
}
