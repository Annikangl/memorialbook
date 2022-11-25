<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\Pet\CreateRequest;
use App\Models\Profile\DeathReason;
use App\Models\Profile\Pet\Pet;
use App\Services\ProfileService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PetController extends Controller
{
    private ProfileService $service;

    public function __construct(ProfileService $service)
    {
        $this->service = $service;
    }

    public function show(string $slug): Factory|View|Application
    {
        $pet = Pet::query()->with(['user', 'galleries'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pet.show', compact('pet'));
    }

    public function create(): Factory|View|Application
    {
        $deathReasons = DeathReason::all();

        return view('pet.create.create', compact('deathReasons'));
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        try {
            $pet = $this->service->createPet(\Auth::id(),$request->validated());
        } catch (\DomainException $exception) {
            return redirect()->back()->with('message', $exception->getMessage());
        }

        return redirect()->route('profile.pet.show', $pet->slug);
    }
}
