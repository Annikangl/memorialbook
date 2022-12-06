<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request): JsonResponse
    {
        $request_data = $request->validated();

        $user = User::register(
            $request_data['full_name'],
            $request_data['email'],
            $request_data['phone'],
            $request_data['password']
        );

        if (!$user) {
            return response()->json(['status' => false, 'message' => 'User not created']);
        }

        event(new Registered($user));

        $token = $user->createToken($request_data['device'])->plainTextToken;

        return response()->json(['status' => true, 'token' => $token, 'user' => new UserResource($user)])
            ->setStatusCode(201);
    }
}
