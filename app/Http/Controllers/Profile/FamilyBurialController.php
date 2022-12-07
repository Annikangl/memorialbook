<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\FamilyBurial\CreateRequest;
use App\Models\Profile\FamilyBurial;
use App\Models\Profile\Human\Human;
use App\Services\FamilyBurialService;
use App\Services\ProfileService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FamilyBurialController extends Controller
{
    private ProfileService $service;
    private FamilyBurialService $burialService;

    public function __construct(ProfileService $service, FamilyBurialService $burialService)
    {
        $this->service = $service;
        $this->burialService = $burialService;
    }

    public function show(FamilyBurial $familyBurial)
    {
        $firstHuman = $familyBurial->humans()->with(['hobbies', 'galleries'])->first();
        $relatives = $firstHuman->WithRelatives()->get();

        return view('family_burial.show', compact('familyBurial', 'firstHuman', 'relatives'));
    }

    public function create(): Factory|View|Application
    {
        return view('family_burial.create');
    }

    public function searchProfile(Request $request): JsonResponse
    {
        $searchText = $request->get('searchText');

        try {
            $profiles = $this->service->search($searchText);
        } catch (\DomainException $exception) {
            return response()->json(['status' => false, 'error' => $exception->getMessage()]);
        }

        return response()->json(['status' => true, 'profiles' => $profiles]);
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        $humans = Human::whereIn('slug', $request->validated('profile_ids'))->get();

        try {
            $familyBurial = $this->burialService->create($humans);
        } catch (\DomainException $exception) {
            return  redirect()->back()->with('message', $exception->getMessage());
        }

        return redirect()->route('profile.family.show', $familyBurial);
    }
}
