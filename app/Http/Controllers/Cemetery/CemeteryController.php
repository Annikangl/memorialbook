<?php

namespace App\Http\Controllers\Cemetery;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cemetery\SearchRequest;
use Illuminate\Http\Request;

class CemeteryController extends Controller
{
    public function map(SearchRequest $request)
    {
        return view('cemetery.map');
    }
}
