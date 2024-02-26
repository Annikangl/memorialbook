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
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $relatedHumans = $user->humans()->latest()->get();
        $cemeteries = $user->subscribedCemeteries()->latest()->get();
        $pets = $user->pets()->latest()->take(15)->get();
        $communities = $user->communities()->latest()->take(10)->get();

        return response()->json([
            'status' => true,
            'data' => [
                'related_humans' => HumanResource::collection($relatedHumans),
                'cemeteries' => CemeteryResource::collection($cemeteries),
                'pets' => PetResource::collection($pets),
                'communities' => CommunityResource::collection($communities),
                'news' => []
            ]
        ])->setStatusCode(Response::HTTP_OK);
    }
}
