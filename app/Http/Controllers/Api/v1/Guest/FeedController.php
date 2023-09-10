<?php

namespace App\Http\Controllers\Api\v1\Guest;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cemetery\CemeteryResource;
use App\Http\Resources\Community\CommunityResource;
use App\Http\Resources\Profile\HumanResource;
use App\Http\Resources\Profile\PetResource;
use App\Models\Cemetery\Cemetery;
use App\Models\Community\Community;
use App\Models\Profile\Base\Profile;
use App\Models\Profile\Human\Human;
use App\Models\Profile\Pet\Pet;
use Illuminate\Http\Response;

class FeedController extends Controller
{
    public function index()
    {
        $celebrityHumans = Human::query()
            ->where('is_celebrity', true)
            ->where('status', Profile::STATUS_ACTIVE)
            ->where('access', Profile::ACCESS_PUBLIC)
            ->limit(10)
            ->get();

        $celebrityCemeteries = Cemetery::query()
            ->where('is_celebrity', true)
            ->where('status', Cemetery::STATUS_ACTIVE)
            ->where('access', Cemetery::ACCESS_PUBLIC)
            ->latest()
            ->limit(10)
            ->get();

        $celebrityPets = Pet::query()
            ->where('is_celebrity', true)
            ->where('status', Profile::STATUS_ACTIVE)
            ->where('access', Profile::ACCESS_PUBLIC)
            ->limit(10)
            ->get();

        $communities = Community::query()
            ->latest()
            ->limit(10)
            ->get();

        $news = [];

        return response()->json([
            'status' => true,
            'data' => [
                'celebrity_humans' => HumanResource::collection($celebrityHumans),
                'celebrity_pets' => PetResource::collection($celebrityPets),
                'cemeteries' => CemeteryResource::collection($celebrityCemeteries),
                'communities' => CommunityResource::collection($communities),
                'news' => $news
            ]]
        )->setStatusCode(Response::HTTP_OK);
    }
}
