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
use Illuminate\Http\Response;
use WendellAdriel\ValidatedDTO\Exceptions\CastTargetException;
use WendellAdriel\ValidatedDTO\Exceptions\MissingCastTypeException;

class RegisterController extends Controller
{
    public function __construct(private readonly RegisterService $registerService)
    {
    }

    /**
     * @throws CastTargetException
     * @throws MissingCastTypeException
     * @throws RegisterException
     */
    public function registerUser(RegisterRequest $request): JsonResponse
    {
        $userDto = UserDTO::fromArray($request->validated());

        $user = $this->registerService->register($userDto);

        event(new Registered($user));

        return response()->json([
            'status' => true,
            'token' => $user->createAuthToken(),
            'user' => new UserResource($user)
        ])->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * @throws CastTargetException
     * @throws MissingCastTypeException
     * @throws RegisterException
     */
    public function registerSeller(RegisterRequest $request): JsonResponse
    {
        $user = $this->registerService->registerSeller(
            UserDTO::fromArray($request->validated())
        );

        event(new Registered($user));

        return response()->json([
            'status' => true,
            'token' => $user->createAuthToken(),
            'user' => new UserResource($user)
        ])->setStatusCode(Response::HTTP_CREATED);
    }
}
