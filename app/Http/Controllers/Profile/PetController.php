<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Profile\Pet\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function show(string $slug)
    {
        $pet = Pet::query()->with(['user', 'galleries', 'hobbies'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pet.show', compact('pet'));
    }
}
