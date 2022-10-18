<?php

namespace App\Http\Controllers\Cemetery;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cemetery\SearchRequest;
use App\Models\Cemetery\Cemetery;
use Illuminate\Http\Request;

class CemeteryController extends Controller
{
    public function map(SearchRequest $request)
    {
        $count_filters = 1;

        $query = Cemetery::query()->byName($request->get('NAME'));

        if ($value = $request->get('ADDRESS')) {
            $query->byAddress($value);
            $count_filters++;
        }

        $cemeteries = $query->paginate(10);

        return view('cemetery.map', compact('cemeteries', 'count_filters'));
    }

    public function list(SearchRequest $request)
    {
        $count_filters = 1;

        $query = Cemetery::query()->byName($request->get('NAME'));

        if ($value = $request->get('ADDRESS')) {
            $query->byAddress($value);
            $count_filters++;
        }

        $cemeteries = $query->paginate(10);

        return view('cemetery.list', compact('cemeteries', 'count_filters'));

    }
}
