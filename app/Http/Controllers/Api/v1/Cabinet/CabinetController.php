<?php

namespace App\Http\Controllers\Api\v1\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User\User;
use App\Services\UserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CabinetController extends Controller
{

    public function __construct(private UserService $service)
    {
    }

    public function show(int $userId): JsonResponse
    {
        $user = User::query()->findOrFail($userId);

        $profiles = $user->humans()->has('owners')->with('owners')->get();

        $owners = [];
        $profiles->each(function ($profile) use (&$owners) {
            $owners[] = $profile->owners->first();
        });


        return response()->json([
            'status' => true,
            'user' => new UserResource($user),
            'count_profiles' => $user->humans()->count(),
            'count_accesses' => count($owners)
        ]);
    }

    public function update(UpdateRequest $request, int $userId): JsonResponse
    {
        $data = $request->validated();
        $user = User::query()->findOrFail($userId);

        try {
            $user = $this->service->update($user, $data['full_name'], $data['email'], $data['phone'], $data['avatar']);
        } catch (\Throwable $exception) {
            return response()->json(['status' => false, 'error' => $exception->getMessage()], 500);
        }

        return response()->json([
            'status' => true,
            'user' => new UserResource($user),
        ]);
    }

    public function delete(int $userId): JsonResponse
    {
        $user = User::findOrFail($userId);

        try {
            $this->service->delete($user);
        } catch (\DomainException $exception) {
            return response()->json(['status' => false,'error' => $exception->getMessage()], 500);
        }

        return response()->json(['status' => true, 'message' => 'Account deleted'], 200);
    }
}
