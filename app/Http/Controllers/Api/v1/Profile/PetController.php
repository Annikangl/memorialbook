<?php

namespace App\Http\Controllers\Api\v1\Profile;

use App\DTOs\Profile\PetDTO;
use App\Exceptions\Api\Profile\PetException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Profile\Pet\CreatePetRequest;
use App\Http\Resources\Profile\PetResource;
use App\Http\Resources\Profile\ShowPetResource;
use App\Models\Profile\Pet\Pet;
use App\Services\PetService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use WendellAdriel\ValidatedDTO\Exceptions\CastTargetException;
use WendellAdriel\ValidatedDTO\Exceptions\MissingCastTypeException;

class PetController extends Controller
{
    public function __construct(private readonly PetService $petService)
    {
    }

    /**
     * Get created pets by auth user
     * @return JsonResponse
     */
    public function byUser(): JsonResponse
    {
        return response()->json([
            'status' => true,
            'pets' => PetResource::collection(auth('sanctum')->user()->pets)
        ])->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Show pet by id
     * @param Pet $pet
     * @return JsonResponse
     */
    public function show(Pet $pet)
    {
        return response()->json(['status' => true, 'pet' => new ShowPetResource($pet)])
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Create a new pet
     * @param CreatePetRequest $request
     * @return JsonResponse
     * @throws CastTargetException
     * @throws MissingCastTypeException
     * @throws PetException
     */
    public function store(CreatePetRequest $request)
    {
        $petDto = PetDTO::fromArray($request->validated());

        $pet = $this->petService->create(
            petDTO: $petDto,
            userId: auth()->id(),
            as_draft: $petDto->as_draft
        );

        return response()->json(['status' => true, 'pet' => new PetResource($pet)])
            ->setStatusCode(Response::HTTP_CREATED);
    }
}
