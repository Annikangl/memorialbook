<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User\User;
use App\Services\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CabinetController extends Controller
{
    private UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index(User $user): Factory|View|Application
    {
        $profiles = $user->profiles()->has('owners')->with('owners')->get();

        $owners = [];

        foreach ($profiles as $profile) {
            $owners[] = $profile->owners->first();
        }

        return view('cabinet.cabinet', compact('user', 'owners'));
    }

    public function update(User $user, UpdateRequest $request): RedirectResponse
    {
        try {
            $updatedUser = $this->service->update(
                $user,
                $request->get('username'),
                $request->get('email'),
                $request->get('phone'),
                $request->file('avatar')
            );

        } catch (\DomainException $exception) {
            return back()->with('message', $exception->getMessage());
        }

        session()->flash('message', 'Данные успешно обновлены');
        session()->flash('alert-class', 'alert-success');

        return redirect()->route('cabinet.show', [
            'user' => $updatedUser
        ]);
    }

    public function delete(Request $request)
    {
        return redirect()->back();
//        return response()->json([
//            'status' => true
//        ]);
    }
}
