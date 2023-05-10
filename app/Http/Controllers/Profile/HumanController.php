<?php

namespace App\Http\Controllers\Profile;

use App\DTOs\Profile\HumanDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\Human\CreateHumanRequest;
use App\Http\Requests\Profile\Human\SearchHumanRequest;
use App\Http\Requests\Profile\Human\UpdateHumanRequest;
use App\ModelFilters\ProfileFilters\HumanFilter;
use App\Models\Profile\Human\Human;
use App\Models\Profile\Religion;
use App\Services\HumanService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class HumanController extends Controller
{
    public function __construct(private HumanService $humanService)
    {
    }

    public function index(): Factory|View|Application
    {
        $humans = Human::query()->orderBy('id')
            ->with('users')
            ->where('user_id', \Auth::id())
            ->get();

        if ($humans->isEmpty()) {
            return view('tree.error');
        }

        return view('tree.index', compact('humans'));
    }

    public function list(): Factory|View|Application
    {
        $humans = Human::query()
            ->orderBy('date_birth')
            ->with('users')
            ->where('user_id', \Auth::id())
            ->paginate(8);

        if ($humans->isEmpty()) {
            return view('tree.error');
        }

        return view('tree.list', compact('humans'));
    }

    public function show(string $slug): Factory|View|Application
    {
        $human = Human::query()->with(['religion'])
            ->where('slug', $slug)
            ->firstOrFail();

        $relatives = Human::query()
            ->where('father_id', $human->id)
            ->orWhere('mother_id', $human->id)
            ->orWhere('spouse_id', $human->id)
            ->orWhere('children_id', $human->id)
            ->get();

        return view('humans.show', compact('human', 'relatives'));
    }

    public function create(): Factory|View|Application
    {
        $humans = Human::query()->where('user_id', auth()->id())->latest()->get();

        $religions = Religion::query()->orderBy('id')->get();

        $fathers = $humans->filter(function ($item) {
            return $item->gender == Human::MALE;
        });

        $mothers = $humans->filter(function ($item) {
            return $item->gender == Human::FEMALE;
        });

        $genders = Human::genderList();

        return view('humans.create.create',
            compact('humans', 'fathers', 'mothers', 'religions', 'genders'));
    }

    public function store(CreateHumanRequest $request): RedirectResponse
    {
        $humanDto = HumanDTO::fromRequest($request);

        try {
            $isDraft = (bool) $request->input('draft');
            $profile = $this->humanService->create(\Auth::id(), $humanDto, $isDraft);

//        TODO    event(new CreateNews($profile, CreateNews::USER_ADDED_PROFILE));

        } catch (\DomainException $exception) {
            return back()->with([
                'message' => $exception->getMessage(),
                'alert-class' => 'alert-danger'
            ])->withInput();
        }

        return redirect()->route('profile.human.show', $profile->slug);
    }

    public function edit(Human $human): Factory|View|Application
    {
        $humans = Human::query()->where('user_id', auth()->id())->latest()->get();

        $religions = Religion::query()->orderBy('id')->get();

        $fathers = $humans->filter(function ($item) {
            return $item->gender == Human::MALE;
        });

        $mothers = $humans->filter(function ($item) {
            return $item->gender == Human::FEMALE;
        });

        $religions = Religion::query()->orderBy('id')->get();

        $genders = Human::genderList();

        return view('humans.edit.edit',
            compact('human', 'genders', 'fathers', 'mothers', 'humans', 'religions'));
    }

    public function update(Human $human, UpdateHumanRequest $request)
    {
        dd($request->all());
    }

    public function map(SearchHumanRequest $request): Factory|View|Application
    {
        $humans = Human::filter($request->validated(), HumanFilter::class)->active()->paginate(15);

        $count_filters = collect($request->input())->filter(function ($value) {
            return !is_null($value);
        })->count();

        return view('humans.map', compact('humans', 'count_filters'));
    }

}
