<?php

namespace App\Http\Controllers\Api\v1\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\SearchRequest;
use App\Http\Resources\Profile\HumanCollection;
use App\Http\Resources\Profile\HumanResource;
use App\Http\Resources\Profile\HumanResourceCollection;
use App\Models\Profile\Base\Profile;
use App\Models\Profile\Human\Human;
use App\Models\User\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HumanController extends Controller
{
    public function show(int $id): JsonResponse
    {
        $human = Human::query()
            ->select(['id', 'first_name', 'last_name', 'description', 'date_birth', 'date_death', 'death_reason'])
            ->with(['hobbies', 'media'])
            ->findOrFail($id);


        return response()->json(['status' => true, 'profile' => new HumanResource($human)])
            ->setStatusCode(200);
    }

    public function search(): JsonResponse
    {
        $profiles = Human::query()->select(['id','first_name','last_name', 'patronymic','date_birth', 'date_death'])
            ->filtered()
            ->paginate(10);

        return response()->json(['status' => true, 'profiles' => HumanResourceCollection::make($profiles)])
            ->setStatusCode(200);
    }
}
