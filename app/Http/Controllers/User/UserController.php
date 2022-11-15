<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Community\Community;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function subscribe(Request $request): JsonResponse
    {
        $communitySlug = $request->get('slug');
        $action = $request->get('action');
        // TODO if (action->isSubscribe())

        try {
            $this->service->subscribeOnCommunity($request->user()->id, $communitySlug);
        } catch (\DomainException $exception) {
            return response()->json(['status' => false, 'error' => $exception->getMessage()]);
        }

        return response()->json(['status' => true, 'action' => $action]);
    }
}
