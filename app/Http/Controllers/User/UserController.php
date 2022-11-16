<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Community\Community;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public const SUBSCRIBE = 'Подписаться';

    public const UNSUBSCRIBE = 'Отписаться';

    private UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function subscribe(Request $request): JsonResponse
    {
        $communitySlug = $request->get('slug');
        $action = $this->getAction($request->get('action'));

        try {
            $this->service->subscribeOnCommunity($request->user()->id, $communitySlug);
        } catch (\DomainException $exception) {
            return response()->json(['status' => false, 'error' => $exception->getMessage()]);
        }

        return response()->json(['status' => true, 'action' => $action]);
    }

    private function isSubscribe(string $action): bool
    {
        return $action === self::SUBSCRIBE;
    }

    private function isUnsubscribe(string $action): bool
    {
        return $action === self::UNSUBSCRIBE;
    }

    private function getAction(string $action): string
    {
        if ($this->isSubscribe($action)) {
            return self::UNSUBSCRIBE;
        }

        return self::SUBSCRIBE;
    }
}
