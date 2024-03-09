<?php

namespace App\Http\Controllers\Api\v1\Shop;

use App\DTOs\Shop\ShopDTO;
use App\Exceptions\Api\Shop\ShopException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Shop\ShopRequest;
use App\Http\Resources\Shop\ShopResource;
use App\Models\Shop\Shop;
use App\Services\Shop\ShopService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use WendellAdriel\ValidatedDTO\Exceptions\CastTargetException;
use WendellAdriel\ValidatedDTO\Exceptions\MissingCastTypeException;

class ShopController extends Controller
{
    public function __construct(private readonly ShopService $shopService)
    {
    }

    /**
     * @param Shop $shop
     * @return JsonResponse
     */
    public function show(Shop $shop): JsonResponse
    {
        $shop->load(['user', 'requisite', 'cemetery']);

        return response()->json(['status' => true, 'shop' => new ShopResource($shop)])
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @throws CastTargetException
     * @throws MissingCastTypeException
     * @throws ShopException
     */
    public function store(ShopRequest $request): JsonResponse
    {
        $shopDTO = ShopDTO::fromArray($request->validated());

        $shop = $this->shopService->create(
            $shopDTO,
            Auth::id()
        );

        return response()->json([
            'status' => true,
            'shop' => new ShopResource($shop->load('requisite'))
        ])->setStatusCode(Response::HTTP_CREATED);
    }
}
