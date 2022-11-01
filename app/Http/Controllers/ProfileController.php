<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\ProfileCreateRequest;
use App\Http\Requests\Profile\ProfileCreateStep2Request;
use App\Http\Requests\Profile\SearchRequest;
use App\Models\Cemetery\Cemetery;
use App\Models\Profile\Hobby;
use App\Models\Profile\Profile;
use App\Models\Profile\Religion;
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

    public function create(){
        $fathers = Profile::query()
//            ->where('gender','male')
            ->with('users')
            ->where('user_id',\Auth::id())
            ->get();

        $mothers = Profile::query()
//            ->where('gender','female')
            ->with('users')
            ->where('user_id',\Auth::id())
            ->get();

        $profiles = Profile::query()
            ->with('users')
            ->where('user_id',\Auth::id())
            ->get();

//        $hobbys = Hobby::query()->orderBy('id')->get();

        $religions = Religion::query()->orderBy('id')->get();

        return view('profile.create',compact('fathers','mothers','profiles','religions'));
    }

    public function create_step1()
    {
        return view('profile.partials.create_step1', );
    }

    public function store(ProfileCreateRequest $request)
    {
        $burial_place_coords = json_decode($request->get('burial_place_coords'),true);

        $father = json_decode($request->get('father_id'), true);
        $spouse = json_decode($request->get('spouse_id'), true);

        $mother = json_decode($request->get('mother_id'), true);

        $religious = json_decode($request->get('religious_id'), true);



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

        $params = $request->except(['_token','burial_place_coords','profile_images']);

        $params['date_birth']=Carbon::parse($params['date_birth'])->format('Y-m-d');
        $params['date_death']=Carbon::parse($params['date_death'])->format('Y-m-d');

        $params['avatar'] = $avatar_path;
        $params['death_certificate'] = $certificate_path;

        if ($burial_place_coords==null){
            $params['latitude']=null;
            $params['longitude']=null;
        }else{
            $params['latitude']=$burial_place_coords['lat'];
            $params['longitude']=$burial_place_coords['lng'];
        }
        $params['user_id'] = \Auth::id();

        if ($father==null){
            $params['father_id']=null;
        }else{
            $params['father_id']=$father['id'];
        }

       if ($spouse==null){
           $params['spouse_id']=null;
       }else{
           $params['spouse_id']=$spouse['id'];
       }

        if ($mother==null){
            $params['mother_id']=null;
        }else{
            $params['mother_id']=$mother['id'];
        }

        if ($religious==null){
            $params['religious_id']=null;
        }else{
            $params['religious_id']=$religious['id'];
        }

        if ($params['burial_place']){
            $cemetery = Cemetery::create([
                'title'=>$params['burial_place'],
                'latitude'=>$params['latitude'],
                'longitude'=> $params['longitude'],
                'address'=> $params['burial_place'],
                'status'=>Cemetery::STATUS_DRAFT,
                'access'=>Cemetery::ACCESS_DENIED,
            ]);
            $params['cemetery_id']=$cemetery->id;
        }

        $profile = Profile::create($params);
        $id_profile = $profile->id;

        $images = $request->file('profile_images');

        if ($request->hasFile('profile_images')) {

            foreach ($images as $image){
                $images_path = $image->store('uploads/profiles/gallery', 'public');
                $profile->galleries()->create([
                'item'=> $images_path,
                'item_sm'=>$images_path,
                'extension'=>$image->extension(),
                'profile_id'=>$id_profile
                ]);

            }

        } else {
            $images_path = null;
        }




        if ($params['spouse_id']!=null){
            Profile::query()->where('id',$params['spouse_id'])
                ->update(['spouse_id'=>$id_profile]);
        }

        if ($params['religious_id']!=null){
            $profile->religions()->attach($params['religious_id']);
        }




        return redirect()->route('tree');
    }

    public function create_step2()
    {

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

        return view('profile.create_step3',compact('profile_step1'));
    }

    public function store_step3(Request $request)
    {
        DB::beginTransaction();

        try{
            $params = $request->session()->get('profile_step1');

            $params_step2 = $request->session()->get('profile_step2');

            $params['user_id'] = \Auth::id();
            $params['description'] = $params_step2['description'];

            $profile = Profile::create($params);
            $id_profile = $profile->id;

            if ($params['spouse_id']!=null){
                Profile::query()->where('id',$params['spouse_id'])
                    ->update(['spouse_id'=>$id_profile]);
            }

            if ($params_step2['hobby_id']!=null){
                $profile->hobbies()->attach($params_step2['hobby_id']);
            }

            if ($params_step2['religious_id']!=null){
                $profile->religions()->attach($params_step2['religious_id']);
            }

        }catch (ValidationException $e)
            {
            DB::rollBack();
                return Redirect::to('/create')
                    ->withErrors($e->getErrors())
                    ->withInput();
            }

        DB::commit();
        return redirect()->route('tree');

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
