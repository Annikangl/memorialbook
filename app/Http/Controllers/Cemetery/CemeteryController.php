<?php

namespace App\Http\Controllers\Cemetery;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cemetery\SearchRequest;
use App\Models\Cemetery\Cemetery;

class CemeteryController extends Controller
{
    public function map(SearchRequest $request)
    {
        $cemeteries = Cemetery::active()->filtered()->paginate(30);
        $count_filters = $this->countApplyFilters($request->input());

        return view('cemetery.map', compact('cemeteries', 'count_filters'));
    }

    public function list(SearchRequest $request)
    {
        $cemeteries = Cemetery::active()->filtered()->paginate(5);
        $count_filters = $this->countApplyFilters($request->input());

        return view('cemetery.list', compact('cemeteries', 'count_filters'));
    }

    public function show(string $slug)
    {
        $cemetery = Cemetery::query()->where('slug', $slug)->with('profiles')->firstOrFail();
        $famous = $cemetery->profiles()->limit(4)->get();


        return view('cemetery.show', compact('cemetery','famous'));
    }

    private function countApplyFilters(array $filters) : int
    {
        return collect($filters)->filter(function ($value) {
            return !is_null($value);
        })->count();
    }
}
