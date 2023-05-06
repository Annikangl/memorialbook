<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\Burial\CreateBurialRequest;
use App\Models\Profile\Burial;
use App\Models\Profile\Human\Human;
use App\Services\BurialService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BurialController extends Controller
{
    public function __construct(private BurialService $burialService)
    {
    }

    public function show(Burial $burial)
    {
        $firstHuman = $burial->humans()->first();
        $relatives = $firstHuman->WithRelatives()->get();

        return view('burial.show', compact('burial', 'firstHuman', 'relatives'));
    }

    public function showShortPage(Burial $burial): Factory|View|Application
    {
        $human = $burial->humans()->firstOrFail();

        return view('burial.short_page', compact('burial', 'human'));
    }

    public function create(): Factory|View|Application
    {
        return view('burial.create');
    }

    public function searchProfile(Request $request): JsonResponse
    {
        $searchText = $request->get('searchText');

        try {
            $profiles = Human::bySearch($searchText)->paginate(5);

            foreach ($profiles as $profile) {
                $profile->avatar = $profile->getFirstMediaUrl('avatars', 'thumb');
            }

        } catch (\DomainException $exception) {
            return response()->json(['status' => false, 'error' => $exception->getMessage()]);
        }

        return response()->json(['status' => true, 'profiles' => $profiles]);
    }

    public function store(CreateBurialRequest $request): RedirectResponse
    {
        $humans = Human::whereIn('slug', $request->validated('profile_ids'))->get();

        try {
            $burial = $this->burialService->create($humans);
        } catch (\DomainException $exception) {
            return redirect()->back()->with('message', $exception->getMessage());
        }

        return redirect()->route('profile.burial.show', $burial);
    }
}
