<?php

namespace App\Http\Controllers\Profile;

use App\DTOs\Profile\HumanDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\Human\CreateHumanRequest;
use App\Http\Requests\Profile\Human\SearchHumanRequest;
use App\Http\Requests\Profile\Human\UpdateHumanRequest;
use App\ModelFilters\HumanFilter;
use App\Models\Profile\Human\Human;
use App\Models\Profile\Human\Religion;
use App\Services\HumanService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use WendellAdriel\ValidatedDTO\Exceptions\CastTargetException;
use WendellAdriel\ValidatedDTO\Exceptions\MissingCastTypeException;


class HumanController extends Controller
{
    public function __construct(private HumanService $humanService)
    {
    }

    public function index(): Factory|View|Application
    {
        $humans = Human::query()
            ->select(['id', 'slug', 'first_name', 'last_name', 'gender', 'date_birth', 'date_death', 'mother_id', 'father_id', 'spouse_id', 'children_id'])
            ->orderBy('id')
            ->with('users')
            ->where('user_id', \Auth::id())
            ->get();

        $humans->each(function (Human $human) {
            $human->avatar = $human->getFirstMediaUrl('avatars', 'thumb');
        });

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
        $human = Human::query()
            ->where('slug', $slug)
            ->firstOrFail();

        $relatives = collect($human->father()->get())
            ->merge($human->mother()->get())
            ->merge($human->children()->get());

        return view('humans.show', compact('human', 'relatives'));
    }

    public function create(): Factory|View|Application
    {
        $humans = Human::query()->where('user_id', auth()->id())->latest()->get();

        $religions = Religion::query()->orderBy('id')->get();

        $fathers = $humans->where('gender', Human::MALE);
        $mothers = $humans->where('gender', Human::FEMALE);

        $genders = Human::genderList();

        return view('humans.create.create',
            compact('humans', 'fathers', 'mothers', 'religions', 'genders'));
    }

    /**
     * @throws CastTargetException
     * @throws MissingCastTypeException
     */
    public function store(CreateHumanRequest $request): RedirectResponse
    {
        $humanDto = HumanDTO::fromRequest($request);

        try {
            $isDraft = (bool)$request->input('draft');
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

        $fathers = $humans->where('gender', Human::MALE);
        $mothers = $humans->where('gender', Human::FEMALE);

        $religions = Religion::query()->orderBy('id')->get();

        $genders = Human::genderList();

        return view('humans.edit.edit',
            compact('human', 'genders', 'fathers', 'mothers', 'humans', 'religions'));
    }

    /**
     * @throws CastTargetException
     * @throws MissingCastTypeException
     */
    public function update(Human $human, UpdateHumanRequest $request)
    {
        $humanDto = HumanDTO::fromArray($request->validated());

        $isDraft = (bool)$request->input('draft');

        try {
            $human = $this->humanService->update($human->id, $humanDto, $request->user(), $isDraft);
        } catch (\Throwable $e) {
            return back()->with(['message' => $e->getMessage()]);
        }

        return redirect()->route('profile.human.show', $human->slug);
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
