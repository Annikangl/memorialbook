<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\DTOs\User\UserDTO;
use App\Exceptions\Api\Auth\RegisterException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User\User;
use App\Services\Auth\RegisterService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use WendellAdriel\ValidatedDTO\Exceptions\CastTargetException;
use WendellAdriel\ValidatedDTO\Exceptions\MissingCastTypeException;

class RegisterController extends Controller
{
    public function __construct(private RegisterService $registerService)
    {
    }

    /**
     * @throws CastTargetException
     * @throws MissingCastTypeException
     * @throws RegisterException
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $userDto = UserDTO::fromArray($request->validated());

        $user = $this->registerService->register($userDto);

        event(new Registered($user));

        return response()->json([
            'status' => true,
            'token' => $user->createAuthToken(),
            'user' => new UserResource($user)
        ])->setStatusCode(201);
    }
}
