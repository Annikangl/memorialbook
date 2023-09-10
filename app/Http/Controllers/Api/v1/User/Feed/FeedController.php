<?php

namespace App\Http\Controllers\Api\v1\User\Feed;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cemetery\CemeteryResource;
use App\Http\Resources\Community\CommunityResource;
use App\Http\Resources\Profile\HumanResource;
use App\Http\Resources\Profile\PetResource;
use App\Models\Cemetery\Cemetery;
use App\Models\Community\Community;
use App\Models\Profile\Human\Human;
use App\Models\Profile\Pet\Pet;

class FeedController extends Controller
{
    public function index()
    {
        $relatedHumans = Human::query()
            ->has('father')
            ->orHas('mother')
            ->orHas('children')
            ->where('user_id', auth()->id())
            ->get();

        $cemeteries = Cemetery::query()->latest()
            ->limit(10)
            ->get();

        $celebrityPets = Pet::query()
            ->where('is_celebrity', true)
            ->where('status', Cemetery::STATUS_ACTIVE)
            ->where('access', Cemetery::ACCESS_PUBLIC)
            ->latest()
            ->limit(10)
            ->get();

        $communities = Community::query()
            ->latest()
            ->limit(10)
            ->get();

        return response()->json([
            'status' => true,
            'data' => [
                'related_humans' => HumanResource::collection($relatedHumans),
                'cemeteries' => CemeteryResource::collection($cemeteries),
                'celebrity_pets' => PetResource::collection($celebrityPets),
                'communities' => CommunityResource::collection($communities),
                'news' => []
            ]
        ])->setStatusCode(200);
    }
}
