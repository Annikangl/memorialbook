<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Profile\FamilyBurial;
use App\Models\Profile\Human\Human;
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

    public function __construct(ProfileService $service)
    {
        $this->service = $service;
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

    public function store(Request $request): RedirectResponse
    {
        $humans = Human::whereIn('slug', $request->get('profile_ids'))->get();

        $burial = FamilyBurial::query()->create();

        $humans->each(function ($human) use ($burial) {
            /** @var Human $human */
           $human->familyBurial()->associate($burial);
           $human->save();
        });

        return redirect()->route('home');
    }
}
