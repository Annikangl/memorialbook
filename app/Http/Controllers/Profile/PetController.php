<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\Pet\CreateRequest;
use App\Models\Profile\DeathReason;
use App\Models\Profile\Pet\Pet;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function show(string $slug): Factory|View|Application
    {
        $pet = Pet::query()->with(['user', 'galleries', 'hobbies'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pet.show', compact('pet'));
    }

    public function create(): Factory|View|Application
    {
        $deathReasons = DeathReason::all();

        return view('pet.create.create', compact('deathReasons'));
    }

    public function store(CreateRequest $request)
    {
        dd($request->all());
    }
}
