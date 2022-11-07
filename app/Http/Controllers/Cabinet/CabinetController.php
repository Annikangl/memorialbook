<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class CabinetController extends Controller
{
    public function index(User $user)
    {
        return view('cabinet.cabinet', compact('user'));
    }
}
