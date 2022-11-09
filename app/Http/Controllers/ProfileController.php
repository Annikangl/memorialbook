<?php

namespace App\Http\Controllers;

use App\Events\CreateNews;
use App\Http\Requests\Profile\ProfileCreateRequest;
use App\Http\Requests\Profile\ProfileCreateStep2Request;
use App\Http\Requests\Profile\SearchRequest;
use App\Models\Cemetery\Cemetery;
use App\Models\Profile\Hobby;
use App\Models\Profile\Profile;
use App\Models\Profile\Religion;
use App\Services\ProfileService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Nette\Schema\ValidationException;
use PhpParser\Node\Stmt\Return_;


/**
 * Class ProfileController
 * @package App\Http\Controllers
 */
class ProfileController extends Controller
{
    private $service;

    public function __construct(ProfileService $profileService)
    {
        $this->service = $profileService;
    }

    public function index()
    {
        $profiles = Profile::query()->orderBy('id')
            ->with('users')
            ->where('user_id', \Auth::id())
            ->get();

        if ($profiles->isEmpty()) {
            return view('tree.error');
        }
        return view('tree.index', compact('profiles'));
    }

    public function list()
    {
        $profiles = Profile::query()
            ->orderBy('date_birth')
            ->with('users')
            ->where('user_id', \Auth::id())
            ->paginate(8);

        if ($profiles->isEmpty()) {
            return view('tree.error');
        }

        return view('tree.list', compact('profiles'));
    }

    public function show(string $slug)
    {
        $profile = Profile::query()->with(['hobbies', 'religions', 'galleries'])
            ->where('slug', $slug)
            ->firstOrFail();

        $relatives = Profile::withRelatives()->get();

        return view('profile.show', compact('profile', 'relatives'));
    }

    public function create()
    {
        $profiles = $this->getProfiles();

        $religions = Religion::query()->orderBy('id')->get();

        $fathers = $profiles->filter(function ($item) {
            return $item->gender == Profile::MALE;
        });

        $mothers = $profiles->filter(function ($item) {
            return $item->gender == Profile::FEMALE;
        });

        $genders = Profile::genderList();

        return view('profile.create.create',
            compact('profiles','fathers', 'mothers', 'religions', 'genders'));
    }

    public function store(ProfileCreateRequest $request)
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

    public function edit(Profile $profile)
    {
        $profiles = $this->getProfiles();
        $religions = Religion::query()->orderBy('id')->get();

        $fathers = $profiles->filter(function ($item) {
            return $item->gender == Profile::MALE;
        });

        $mothers = $profiles->filter(function ($item) {
            return $item->gender == Profile::FEMALE;
        });

        $genders = Profile::genderList();

        return view('profile.edit.edit',
            compact('profile', 'profiles','genders','mothers','fathers', 'religions'));
    }

    public function map(SearchRequest $request)
    {
        $profiles = Profile::active()->filtered()->paginate(30);

        $count_filters = collect($request->input())->filter(function ($value) {
            return !is_null($value);
        })->count();


        return view('profile.map', compact('profiles', 'count_filters'));
    }

    private function getProfiles(): array|Collection|\Illuminate\Support\Collection
    {
     return Profile::byUser(auth()->id())
            ->addSelect('gender')
            ->get();
    }

}
