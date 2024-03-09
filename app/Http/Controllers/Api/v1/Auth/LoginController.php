<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Exceptions\Api\Auth\LoginException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use App\Services\Auth\LoginService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(private readonly LoginService $loginService)
    {
    }

    /**
     * @throws LoginException
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $this->getCredentials($request);

        $user = $this->loginService->login(
            $credentials,
            $request->validated('device_name'),
            $request->validated('fcm_token')
        );

        return response()->json([
            'status' => true,
            'token' => $user->createAuthToken(),
            'user' => new UserResource($user)
        ])->setStatusCode(200);
    }

    public function logout(Request $request): JsonResponse
    {
        $this->loginService->logout($request->user());

        return response()->json(['status' => true, 'message' => 'User logged out'])
            ->setStatusCode(200);
    }

    protected function getCredentials(LoginRequest $request): array
    {
        return [
            'email' => $request->validated('email'),
            'password' => $request->validated('password')
        ];
    }
}
