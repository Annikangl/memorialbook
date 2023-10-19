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
use WendellAdriel\ValidatedDTO\Exceptions\CastTargetException;
use WendellAdriel\ValidatedDTO\Exceptions\MissingCastTypeException;

class CemeteryController extends Controller
{
    public function __construct(private CemeteryService $cemeteryService)
    {
    }

    public function search(SearchCemeteryRequest $request)
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
    public function store(CreateCemeteryRequest $request)
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
}
