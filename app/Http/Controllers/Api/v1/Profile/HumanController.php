<?php

namespace App\Http\Controllers\Api\v1\Profile;

use App\DTOs\Profile\HumanDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Profile\Human\CreateHumanRequest;
use App\Http\Requests\Api\Profile\Human\SearchHumanRequest;
use App\Http\Resources\Profile\CreatedHumanResource;
use App\Http\Resources\Profile\HumanResource;
use App\Http\Resources\Profile\PetResource;
use App\Http\Resources\Profile\ShowHumanResource;
use App\Models\Profile\Human\Human;
use App\Services\HumanService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use WendellAdriel\ValidatedDTO\Exceptions\CastTargetException;
use WendellAdriel\ValidatedDTO\Exceptions\MissingCastTypeException;

class HumanController extends Controller
{
    public function __construct(private readonly HumanService $humanService)
    {
    }

    public function byUser(Request $request): JsonResponse
    {
        if ($request->get('gender') === Human::MALE) {
            return $this->getFathers();
        }

        if ($request->get('gender') === Human::FEMALE) {
            return $this->getMothers();
        }

        return response()->json([
            'status' => true,
            'humans' => HumanResource::collection(auth()->user()->humans()->get()),
        ])->setStatusCode(Response::HTTP_OK);
    }

    public function show(Human $human): JsonResponse
    {
        $kinsfolk = collect($human->father()->get())
            ->merge($human->mother()->get())
            ->merge($human->children()->get());

        $pets = $human->pets()->get();

        return response()->json(['status' => true,
            'human' => new ShowHumanResource($human->load('religion')),
            'kinsfolk' => HumanResource::collection($kinsfolk),
            'pets' =>  PetResource::collection($pets)
        ])->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @throws CastTargetException
     * @throws MissingCastTypeException
     */
    public function store(CreateHumanRequest $request): JsonResponse
    {
        $humanDto = HumanDTO::fromArray($request->validated());

        $human = $this->humanService->create(
            userId: auth()->id(),
            humanDTO: $humanDto,
            draft: $humanDto->as_draft
        );

        return response()->json(['status' => true, 'human' => new CreatedHumanResource($human)])
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function search(SearchHumanRequest $request): JsonResponse
    {
        $humans = Human::query()
            ->filter($request->validated())
            ->latest()
            ->paginate(10);

        return response()->json(['status' => true, 'humans' => HumanResource::collection($humans)])
            ->setStatusCode(Response::HTTP_OK);
    }

    public function searchCount(SearchHumanRequest $request): JsonResponse
    {
        $humansFilteredCount = Human::getFilteredCount($request->validated());

        return response()->json(['status' => true, 'profiles_count' => $humansFilteredCount])
            ->setStatusCode(Response::HTTP_OK);
    }

    private function getFathers(): JsonResponse
    {
        $fathers = auth()->user()->humans()->where('gender', Human::MALE)->get();

        return response()->json(['status' => true, 'humans' => HumanResource::collection($fathers)])
            ->setStatusCode(Response::HTTP_OK);
    }

    private function getMothers(): JsonResponse
    {
        $mothers = auth()->user()->humans()->where('gender', Human::FEMALE)->get();

        return response()->json(['status' => true, 'humans' => HumanResource::collection($mothers)])
            ->setStatusCode(Response::HTTP_OK);
    }
}
