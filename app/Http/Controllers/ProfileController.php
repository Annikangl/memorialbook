<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\ProfileCreateRequest;
use App\Http\Requests\Profile\SearchRequest;
use App\Models\Profile\Hobby;
use App\Models\Profile\Profile;
use App\Models\Profile\Religion;
use Illuminate\Http\Request;



/**
 * Class ProfileController
 * @package App\Http\Controllers
 */
class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::query()->orderBy('id')
            ->with('users')
            ->where('user_id',\Auth::id())
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
            ->where('user_id',\Auth::id())
            ->paginate(8);

        if ($profiles->isEmpty()) {
            return view('tree.error');
        }

//        $medias=Profile::find(45)->getMedia('avatar')->all();

        return view('tree.list', compact('profiles',));
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
        $fathers = Profile::query()
            ->where('gender','male')
            ->with('users')
            ->where('user_id',\Auth::id())
            ->get();

        $mothers = Profile::query()
            ->where('gender','female')
            ->with('users')
            ->where('user_id',\Auth::id())
            ->get();

        $profiles = Profile::query()
            ->with('users')
            ->where('user_id',\Auth::id())
            ->get();

        return view('profile.create', compact('fathers','mothers','profiles'));
    }

    public function store(ProfileCreateRequest $request)
    {
        if ($request->hasFile('avatar')) {
            $avatar_path = $request->file('avatar')->store('uploads/profiles/avatar', 'public');
        } else {
            $avatar_path = null;
        }

        if ($request->hasFile('death_certificate')) {
            $certificate_path = $request->file('death_certificate')->store('uploads/profiles/document','public');
        } else {
            $certificate_path = null;
        }

        $params = $request->all();
        $params = $request->except(['_token']);
        $params['avatar'] = $avatar_path;
        $params['death_certificate'] = $certificate_path;

        $request->session()->put('profile_step1', $params);

//        $profile = Profile::create($params)
//            ->addMedia($request->file('avatar'))
//            ->toMediaCollection('avatar','avatar');

        return redirect()->route('profile.create.step2');
// Перебрасывать на шаг 2 с id который только создал и его там сохранять чтобы при записи дополнялись данные уже в текущую запись
        //загрузка данных в сессию с дальнейшей переброской по маршрутам
    }

    public function create_step2()
    {
        $hobbys = Hobby::query()->orderBy('id')->get();
        $religions = Religion::query()->orderBy('id')->get();

        return view('profile.create_step2',compact('hobbys','religions'));
    }


    public function store_step2(Request $request)
    {

        $params = $request->all();
        $params = $request->except(['_token']);

        $request->session()->put('profile_step2', $params);
        $value = $request->session()->all();
//        dd($value);
        return redirect()->route('profile.create.step3');
    }


    public function create_step3()
    {
//        $value = $request->;
        dd(session()->all());
        return view('profile.create_step3');
    }
    public function store_step3(Request $request){

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
