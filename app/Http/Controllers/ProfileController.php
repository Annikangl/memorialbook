<?php

namespace App\Http\Controllers;

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
        $profiles = Profile::query()->orderBy('id')->get();
        if ($profiles->isEmpty()) {
            return view('tree.error');
        }
        return view('tree.index', compact('profiles'));
    }

    public function list()
    {
        $profiles = Profile::query()->orderBy('date_birth')
            ->whereNotNull('date_death')
            ->get();

        return view('tree.list', compact('profiles'));
    }

    public function show(string $slug)
    {
        /** @var Profile $profile */
        $profile = Profile::query()->with(['hobbies', 'religions', 'galleries'])
            ->where('slug', $slug)
            ->firstOrFail();

        $relatives = Profile::query()
            ->select('first_name', 'last_name', 'patronymic', 'slug', 'avatar')
            ->whereIn('id', [$profile->mother_id, $profile->father_id, $profile->spouse_id, $profile->child_id])
            ->get();

        return view('profile.show', compact('profile', 'relatives'));
    }

    public function create()
    {
        $fathers = Profile::query()->where('gender','male')->get();
        $mothers = Profile::query()->where('gender','female')->get();
        $profiles = Profile::query()->get();

        return view('profile.create', compact('fathers','mothers','profiles'));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $avatar_path = $request->file('avatar')->store('avatar_profile', 'public');
        } else {
            $avatar_path = null;
        }

        if ($request->hasFile('death_certificate')) {
            $certificate_path = $request->file('death_certificate')->store('death_certificate');
        } else {
            $certificate_path = null;
        }

        $params = $request->all();
        $params = $request->except(['_token']);
        $params['avatar'] = $avatar_path;
        $params['death_certificate'] = $certificate_path;

//        dd()
        $request->session()->put('profile', $params);
//        $profile = Profile::create($params);

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
        $value = $request->session()->get('profile');
        dd($value);
    }


    public function create_step3()
    {
        return view('profile.create_step3');
    }

    public function map(SearchRequest $request)
    {
        $profiles = Profile::filtered()->paginate(30);

        $count_filters = collect($request->input())->filter(function ($value) {
            return !is_null($value);
        })->count();


        return view('profile.map', compact('profiles', 'count_filters'));
    }

}
