<?php

namespace App\Http\Controllers\Api\v1\Community;

use App\Http\Controllers\Controller;
use App\Http\Resources\Community\CommunityResource;
use App\Http\Resources\Profile\ShowCommunityResource;
use App\Models\Community\Community;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CommunityController extends Controller
{
    public function index(): JsonResponse
    {
        $featuredCommunities = Community::query()
            ->where('is_celebrity', true)
            ->limit(6)
            ->get();

        $communities = Community::query()->limit(10)->get();

        return response()->json([
            'status' => true,
            'featured_communities' => CommunityResource::collection($featuredCommunities),
            'communities' => CommunityResource::collection($communities)]
        )->setStatusCode(Response::HTTP_OK);
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
}
