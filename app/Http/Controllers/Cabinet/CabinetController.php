<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User\User;
use App\Services\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class CabinetController extends Controller
{
    private UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index(string $slug): Factory|View|Application
    {
        $user = User::where('slug', $slug)->first();

        $profiles = $user->humans()->has('owners')->with('owners')->get();

        $owners = [];
        $profiles->each(function ($profile) use (&$owners) {
            $owners[] = $profile->owners->first();
        });

        return view('cabinet.cabinet', compact('user', 'owners'));
    }

    public function update(User $user, UpdateRequest $request): RedirectResponse
    {
        $validated_data = $request->validated();

        try {
            $updatedUser = $this->service->update(
                $user,
                $validated_data['full_name'],
                $validated_data['email'],
                $validated_data['phone'],
                $validated_data['avatar']
            );
        } catch (\DomainException | FileDoesNotExist | FileIsTooBig $exception) {
            return back()->with('message', $exception->getMessage());
        }

        return redirect()->route('cabinet.show', [
            'slug' => $updatedUser->slug
        ]);
    }

    public function delete(): JsonResponse
    {
        try {
            $this->service->delete(auth()->user());
        } catch (\DomainException $exception) {
            return response()->json(['status' => false, 'message' => $exception->getMessage()]);
        }

        return response()->json(['status' => true]);
    }
}
