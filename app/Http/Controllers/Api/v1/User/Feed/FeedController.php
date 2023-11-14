<?php

namespace App\Http\Controllers\Api\v1\User\Feed;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cemetery\CemeteryResource;
use App\Http\Resources\Community\CommunityResource;
use App\Http\Resources\Profile\HumanResource;
use App\Http\Resources\Profile\PetResource;
use App\Models\Community\Community;
use App\Models\Profile\Cemetery\Cemetery;
use App\Models\Profile\Human\Human;
use App\Models\Profile\Pet\Pet;
use Illuminate\Support\Facades\Auth;

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

        $cemeteries = Auth::user()->subscribedCemeteries()->latest()->get();

        $pets = Pet::query()
            ->where('is_celebrity', true)
            ->latest()
            ->limit(10)
            ->get();

        $communities = Community::query()
            ->where('owner_id', auth()->id())
            ->latest()
            ->limit(10)
            ->get();

        return response()->json([
            'status' => true,
            'data' => [
                'related_humans' => HumanResource::collection($relatedHumans),
                'cemeteries' => CemeteryResource::collection($cemeteries),
                'pets' => PetResource::collection($pets),
                'communities' => CommunityResource::collection($communities),
                'news' => []
            ]
        ])->setStatusCode(200);
    }
}
