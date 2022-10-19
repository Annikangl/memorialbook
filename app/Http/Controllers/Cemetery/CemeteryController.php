<?php

namespace App\Http\Controllers\Cemetery;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cemetery\SearchRequest;
use App\Models\Cemetery\Cemetery;
use Illuminate\Contracts\View\View;

class CemeteryController extends Controller
{
    public function map(SearchRequest $request): View
    {
        $cemeteries = Cemetery::filtered()->paginate(30);
        $count_filters = count($request->input());

        return view('cemetery.map', compact('cemeteries', 'count_filters'));
    }

    public function list(SearchRequest $request): View
    {
        $cemeteries = Cemetery::filtered()->paginate(5);
        $count_filters = count($request->input());

        return view('cemetery.list', compact('cemeteries', 'count_filters'));
    }
}
