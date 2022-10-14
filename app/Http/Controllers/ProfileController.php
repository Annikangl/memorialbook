<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        $profiles = Profile::orderBy('id')->get();
        return view('tree.index', compact('profiles'));
    }

    public function list(){
        $profiles = Profile::orderBy('date_birth')
            ->whereNotNull('date_death')
            ->get();
        return view('tree.list',compact('profiles'));
    }

    public function create(){
        return view('profile.create');
    }

    public function store(Request $request){

        if ($request->hasFile('avatar')){
            $avatar_path = $request->file('avatar')->store('avatar_profile', 'public');
        }else{
            $avatar_path = null;
        }

        if ($request->hasFile('death_certificate')){
            $certificate_path = $request->file('death_certificate')->store('death_certificate');
        }else{
            $certificate_path = null;
        }

        $params = $request->all();
        $params['avatar']=$avatar_path;
        $params['death_certificate']=$certificate_path;

        $request->session()->put('profile',$params);
//        $profile = Profile::create($params);

        return redirect()->route('profile.create.step2');
// Перебрасывать на шаг 2 с id который только создал и его там сохранять чтобы при записи дополнялись данные уже в текущую запись
        //загрузка данных в сессию с дальнейшей переброской по маршрутам
    }
    public function create_step2(Request $request){
        return view('profile.create_step2');
    }
    public function store_step2(Request $request){
        dd($request);
        $params = $request->all();
        $value = $request->session()->get('profile');
        dd($value);
    }

    public function create_step3(){

        return view('profile.create_step3');
    }



}
