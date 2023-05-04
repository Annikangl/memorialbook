<?php

namespace App\Http\Controllers\Profile;

use App\DTOs\Profile\PetDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\Pet\CreatePetRequest;
use App\Models\Profile\Pet\Pet;
use App\Services\PetService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use WendellAdriel\ValidatedDTO\Exceptions\CastTargetException;
use WendellAdriel\ValidatedDTO\Exceptions\MissingCastTypeException;

class PetController extends Controller
{
    public function __construct(private PetService $service)
    {
    }

    public function show(string $slug): Factory|View|Application
    {
        $pet = Pet::query()->with(['user', 'media'])
            ->where('slug', $slug)
            ->firstOrFail();


        return view('pet.show', compact('pet'));
    }

    public function create(): Factory|View|Application
    {
        return view('pet.create.create');
    }

    /**
     * @throws CastTargetException
     * @throws MissingCastTypeException
     */
    public function store(CreatePetRequest $request): RedirectResponse
    {
        $petDto = PetDTO::fromArray($request->validated());

        try {
            $pet = $this->service->create($petDto, \Auth::id());
        } catch (\Throwable $exception) {
            return redirect()->back()
                ->with('message', 'Failed to create pet profile')
                ->withInput();
        }

        return redirect()->route('profile.pet.show', $pet->slug);
    }
}
