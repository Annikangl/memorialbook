<?php

namespace App\Http\Controllers\Profile;

use App\Events\CreateNews;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ProfileCreateRequest;
use App\Http\Requests\Profile\ProfileCreateStep2Request;
use App\Http\Requests\Profile\SearchRequest;
use App\Models\Cemetery\Cemetery;
use App\Models\Profile\Hobby;
use App\Models\Profile\Human\Human;
use App\Models\Profile\Religion;
use App\Services\ProfileService;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Nette\Schema\ValidationException;
use PhpParser\Node\Stmt\Return_;


class HumanController extends Controller
{
    private ProfileService $service;

    public function __construct(ProfileService $personservice)
    {
        $this->service = $personservice;
    }

    public function index(): Factory|View|Application
    {
        $profiles = Human::query()->orderBy('id')
            ->with('users')
            ->where('user_id', \Auth::id())
            ->get();

        if ($profiles->isEmpty()) {
            return view('tree.error');
        }
        return view('tree.index', compact('profiles'));
    }

    public function list(): Factory|View|Application
    {
        $profiles = Human::query()
            ->orderBy('date_birth')
            ->with('users')
            ->where('user_id', \Auth::id())
            ->paginate(8);

        if ($profiles->isEmpty()) {
            return view('tree.error');
        }

        return view('tree.list', compact('profiles'));
    }

    public function show(string $slug): Factory|View|Application
    {
        $profile = Human::query()->with(['hobbies', 'religions', 'galleries'])
            ->where('slug', $slug)
            ->firstOrFail();

        $relatives = Human::withRelatives()->get();

        return view('profile.show', compact('profile', 'relatives'));
    }

    public function create(): Factory|View|Application
    {
        $profiles = $this->getProfiles();

        $religions = Religion::query()->orderBy('id')->get();

        $fathers = $profiles->filter(function ($item) {
            return $item->gender == Human::MALE;
        });

        $mothers = $profiles->filter(function ($item) {
            return $item->gender == Human::FEMALE;
        });

        $genders = Human::genderList();

        return view('profile.create.create',
            compact('profiles','fathers', 'mothers', 'religions', 'genders'));
    }

    public function store(ProfileCreateRequest $request): RedirectResponse
    {
        $request->validated();
        try {
            $profile = $this->service->create(\Auth::id(), $request);
            event(new CreateNews($profile, CreateNews::USER_ADDED_PROFILE));
        } catch (\DomainException $exception) {
            return back()->with([
                'message' => $exception->getMessage(),
                'alert-class' => 'alert-danger'
            ]);
        }

        return redirect()->route('profile.show', $profile->slug);
    }

    public function edit(Human $profile): Factory|View|Application
    {
        $profile = $this->getProfiles();
        $religions = Religion::query()->orderBy('id')->get();

        $fathers = $persons->filter(function ($item) {
            return $item->gender == Human::MALE;
        });

        $mothers = $persons->filter(function ($item) {
            return $item->gender == Human::FEMALE;
        });

        $genders = Human::genderList();

        return view('profile.edit.edit',
            compact('profile', 'persons','genders','mothers','fathers', 'religions'));
    }

    public function map(SearchRequest $request): Factory|View|Application
    {
        $profiles = Human::active()->filtered()->paginate(30);

        $count_filters = collect($request->input())->filter(function ($value) {
            return !is_null($value);
        })->count();


        return view('profile.map', compact('persons', 'count_filters'));
    }

    private function getProfiles(): array|Collection|\Illuminate\Support\Collection
    {
     return Human::byUser(auth()->id())
            ->addSelect('gender')
            ->get();
    }

}
