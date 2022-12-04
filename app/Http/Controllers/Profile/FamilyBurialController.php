<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Services\ProfileService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FamilyBurialController extends Controller
{
    private ProfileService $service;

    public function __construct(ProfileService $service)
    {
        $this->service = $service;
    }

    public function create()
    {
        return view('family_burial.create');
    }

    public function searchProfile(Request $request): JsonResponse
    {
        $searchText = $request->get('searchText');

        try {
            $profiles = $this->service->search($searchText);
        } catch (\DomainException $exception) {
            return response()->json(['error' => $exception->getMessage()]);
        }

        return response()->json(['status' => true, 'profiles' => $profiles]);
    }
}
