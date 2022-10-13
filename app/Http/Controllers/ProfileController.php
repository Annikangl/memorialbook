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
        return view('tree.list');
    }

    public function create(){
        return view('profile.create');
    }

    public function store(Request $request){

        $avatar_path = $request->file('avatar')->store('avatar profile');
        $certificate_path = $request->file('death_certificate')->store('death certificate');
        $params = $request->all();
        $params['avatar']=$avatar_path;
        $params['death_certificate']=$certificate_path;

        $profile = Profile::create($params);

        return view('tree.index');

    }


}
