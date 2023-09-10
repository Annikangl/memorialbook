<?php

namespace App\Http\Controllers\Api\v1\User\Profile;

use App\DTOs\Profile\PetDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\Pet\CreatePetRequest;
use App\Http\Resources\Profile\PetResource;
use App\Services\PetService;
use Illuminate\Http\Response;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use WendellAdriel\ValidatedDTO\Exceptions\CastTargetException;
use WendellAdriel\ValidatedDTO\Exceptions\MissingCastTypeException;

class PetController extends Controller
{
    public function __construct(private PetService $petService)
    {
    }

    /**
     * @throws MissingCastTypeException
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     * @throws CastTargetException
     */
    public function store(CreatePetRequest $request)
    {
        $petDto = PetDTO::fromArray($request->validated());

        $pet = $this->petService->create(
            petDTO:  $petDto,
            userId: auth()->id(),
            as_draft: $petDto->as_draft
        );

        return response()->json(['status' => true, 'pet' => new PetResource($pet)])
            ->setStatusCode(Response::HTTP_CREATED);
    }
}
