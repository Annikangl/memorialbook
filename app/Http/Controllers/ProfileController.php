<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){

    }

    public function create(){
    return view('profile.create');
    }
}
