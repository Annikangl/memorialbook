<?php

namespace App\Http\Controllers\Api\v1\Community;

use App\DTOs\Community\CommunityDTO;
use App\Exceptions\Api\Community\CommunityException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Community\CreateCommunityRequest;
use App\Http\Requests\Community\SearchCommunityRequest;
use App\Http\Resources\Community\CommunityCollection;
use App\Http\Resources\Community\CommunityResource;
use App\Http\Resources\Profile\ShowCommunityResource;
use App\Models\Community\Community;
use App\Services\CommunityService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use WendellAdriel\ValidatedDTO\Exceptions\CastTargetException;
use WendellAdriel\ValidatedDTO\Exceptions\MissingCastTypeException;

class CommunityController extends Controller
{
    public function __construct(private CommunityService $communityService)
    {
    }

    public function index(): JsonResponse
    {
        $user = Auth::guard('sanctum')->user();

        $featuredCommunities = Community::query()
            ->where('is_celebrity', true)
            ->limit(6)
            ->get();

        if ($user) {
            $communities = $user->subscribedCommunities->merge($user->communities);
        } else {
            $communities = Community::query()->limit(10)->get();
        }

        return response()->json([
            'status' => true,
            'featured_communities' => CommunityResource::collection($featuredCommunities),
            'communities' => CommunityResource::collection($communities)
        ])->setStatusCode(Response::HTTP_OK);
    }

    public function show(Community $community): JsonResponse
    {
        $community->load([
            'users' => function (BelongsToMany $query) {
                return $query->limit(7)->get();
            },
            'posts',
            'media',
            'communityProfiles',
            'communityProfiles.profileable'
        ])->loadCount('users')->has('media');

        return response()->json(['status' => true, 'communities' => new ShowCommunityResource($community)])
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @throws CastTargetException|MissingCastTypeException|CommunityException
     */
    public function store(CreateCommunityRequest $request): JsonResponse
    {
        $communityDto = CommunityDTO::fromArray($request->validated());

        $community = $this->communityService->create(
            userId: auth()->id(),
            communityDTO: $communityDto
        );

        return response()->json(['status' => true, 'community' => new CommunityResource($community)])
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function search(SearchCommunityRequest $request): JsonResponse
    {
        $communities = $this->communityService->search($request->validated());

        return response()->json(['status' => true, 'communities' => new CommunityCollection($communities)])
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @throws CommunityException
     */
    public function subscribe(Community $community): JsonResponse
    {
        try {
            $this->communityService->subscribe(auth()->id(), $community->id);
        } catch (ModelNotFoundException|CommunityException $exception) {
            throw new CommunityException($exception->getMessage(), $exception->getCode());
        }

        return \response()->json(['status' => true, 'message' => 'Subscribe successful'])
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * @throws CommunityException
     */
    public function unsubscribe(Community $community): JsonResponse
    {
        try {
            $this->communityService->unsubscribe(auth()->id(), $community->id);
        } catch (ModelNotFoundException|CommunityException $exception) {
            throw new CommunityException($exception->getMessage(), $exception->getCode());
        }

        return \response()->json(['status' => true, 'message' => 'Unsubscribe successful'])
            ->setStatusCode(Response::HTTP_OK);
    }
}
