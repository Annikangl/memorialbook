<?php

namespace App\Http\Controllers\Api\v1\Profile;

use App\DTOs\Cemetery\CemeteryDTO;
use App\Exceptions\Api\Profile\CemeteryException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Profile\Cemetery\CreateCemeteryRequest;
use App\Http\Requests\Api\Profile\Cemetery\SearchCemeteryRequest;
use App\Http\Resources\Cemetery\CemeteryResource;
use App\Http\Resources\Cemetery\ShowCemeteryResource;
use App\Models\Profile\Cemetery\Cemetery;
use App\Services\CemeteryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use WendellAdriel\ValidatedDTO\Exceptions\CastTargetException;
use WendellAdriel\ValidatedDTO\Exceptions\MissingCastTypeException;

class CemeteryController extends Controller
{
    public function __construct(private CemeteryService $cemeteryService)
    {
    }

    public function index(): JsonResponse
    {
        $user = Auth::guard('sanctum')->user();

        $featuredCemeteries = Cemetery::query()
            ->where('is_celebrity', true)
            ->limit(6)
            ->get();

        $cemeteries = $user->subscribedCemeteries->merge($user->cemeteries);

        return response()->json([
            'status' => true,
            'featured_cemeteries' => CemeteryResource::collection($featuredCemeteries),
            'cemeteries' => CemeteryResource::collection($cemeteries)
        ])->setStatusCode(Response::HTTP_OK);
    }

    public function search(SearchCemeteryRequest $request): JsonResponse
    {
        $cemeteries = Cemetery::query()
            ->filter($request->validated())
            ->latest()
            ->paginate(10);

        return response()->json(['status' => true, 'cemeteries' => CemeteryResource::collection($cemeteries)])
            ->setStatusCode(Response::HTTP_OK);
    }

    public function show(Cemetery $cemetery): JsonResponse
    {
        return response()->json(['status' => true, 'cemetery' => new ShowCemeteryResource($cemetery)])
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @throws MissingCastTypeException|CemeteryException|CastTargetException
     */
    public function store(CreateCemeteryRequest $request): JsonResponse
    {
        $cemeteryDto = CemeteryDTO::fromArray($request->validated());

        $cemetery = $this->cemeteryService->create(
            $cemeteryDto,
            auth()->id(),
            $cemeteryDto->as_draft
        );

        return response()->json(['status' => true, 'cemetery' => new CemeteryResource($cemetery)])
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * @throws CemeteryException
     */
    public function subscribe(Cemetery $cemetery): JsonResponse
    {
        $this->cemeteryService->subscribe(Auth::guard('sanctum')->user(), $cemetery);

        return response()->json(['status' => true, 'message' => 'You are subscribed successful'])
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * @throws CemeteryException
     */
    public function unsubscribe(Cemetery $cemetery): JsonResponse
    {
        $this->cemeteryService->unsubscribe(Auth::guard('sanctum')->user(), $cemetery);

        return response()->json(['status' => true, 'message' => 'You are unsubscribed'])
            ->setStatusCode(Response::HTTP_CREATED);
    }
}
