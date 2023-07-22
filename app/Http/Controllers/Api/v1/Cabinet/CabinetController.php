<?php

namespace App\Http\Controllers\Api\v1\Cabinet;

use App\DTOs\User\UserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\UpdateUserRequest;
use App\Http\Resources\Cabinet\UserResource;
use App\Models\User\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use WendellAdriel\ValidatedDTO\Exceptions\CastTargetException;
use WendellAdriel\ValidatedDTO\Exceptions\MissingCastTypeException;

class CabinetController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    public function show()
    {
        $user = User::query()
            ->select(['id', 'username', 'email'])
            ->find(auth()->id());

        return response()->json(['status' => true, 'user' => new UserResource($user)])
            ->setStatusCode(200);
    }

    /**
     * @throws MissingCastTypeException
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     * @throws CastTargetException
     */
    public function update(UpdateUserRequest $request)
    {
        $userDTO = UserDTO::fromArray($request->validated());

        $user = $this->userService->update(
            auth()->user(),
            $userDTO->username,
            $userDTO->email,
            $userDTO->phone,
            $userDTO->avatar
        );

        return response()->json(['status' => true, 'user' => new UserResource($user)])
            ->setStatusCode(200);
    }
}
