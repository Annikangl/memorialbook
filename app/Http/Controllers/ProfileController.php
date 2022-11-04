<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\ProfileCreateRequest;
use App\Http\Requests\Profile\ProfileCreateStep2Request;
use App\Http\Requests\Profile\SearchRequest;
use App\Models\Cemetery\Cemetery;
use App\Models\Profile\Hobby;
use App\Models\Profile\Profile;
use App\Models\Profile\Religion;
use App\Services\ProfileService;
use Carbon\Carbon;
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

        $relatives = Profile::query()
            ->select(['first_name', 'last_name', 'patronymic', 'slug', 'avatar'])
            ->whereIn('id', [$profile->mother_id, $profile->father_id, $profile->spouse_id, $profile->child_id])
            ->get();

        return view('profile.show', compact('profile', 'relatives'));
    }

    public function create()
    {
        // TODO add with()
        $fathers = Profile::query()
            ->where('gender','male')
            ->with('users')
            ->where('user_id', \Auth::id())
            ->get();

        $mothers = Profile::query()
            ->where('gender','female')
            ->with('users')
            ->where('user_id', \Auth::id())
            ->get();

        $profiles = Profile::query()
            ->with('users')
            ->where('user_id', \Auth::id())
            ->get();

        $religions = Religion::query()->orderBy('id')->get();

        return view('profile.create',
            compact('fathers', 'mothers', 'profiles', 'religions'));
    }

    public function create_step1()
    {
        return view('profile.partials.create_step1',);
    }

    public function store(ProfileCreateRequest $request)
    {
        try {
            $profile = $this->service->create(\Auth::id(), $request);
        } catch (\DomainException $exception) {
            return back()->withErrors($exception->getMessage());
        }

        return redirect()->route('profile.show', $profile->slug);
    }

    public function store_step2(Request $request)
    {
        $params = $request->all();
        $params = $request->except(['_token']);

        $request->session()->put('profile_step2', $params);
        $value = $request->session()->all();

        return redirect()->route('profile.create.step3');
    }


    public function create_step3(Request $request)
    {
        $profile_step1 = $request->session()->get('profile_step1');

        return view('profile.create_step3', compact('profile_step1'));
    }

    public function map(SearchRequest $request)
    {
        $profiles = Profile::active()->filtered()->paginate(30);

        $count_filters = collect($request->input())->filter(function ($value) {
            return !is_null($value);
        })->count();


        return view('profile.map', compact('profiles', 'count_filters'));
    }

}
