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
            ->with('user')
            ->where('user_id', auth('sanctum')->id())
            ->where(function ($query) {
                $query->has('father')
                    ->orHas('mother')
                    ->orHas('children');
            })
            ->get();

        $cemeteries = Auth::user()->subscribedCemeteries()->latest()->get();

        $pets = Pet::query()
            ->with('user')
            ->where('user_id', auth()->id())
            ->latest()
            ->limit(10)
            ->get();

        $communities = Community::query()
            ->with('owner')
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
