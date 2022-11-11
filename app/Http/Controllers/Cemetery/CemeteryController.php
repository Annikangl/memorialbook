<?php

namespace App\Http\Controllers\Cemetery;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cemetery\CreateRequest;
use App\Http\Requests\Cemetery\SearchRequest;
use App\Models\Cemetery\Cemetery;
use App\Services\CemeteryService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CemeteryController extends Controller
{
    private CemeteryService $service;

    public function __construct(CemeteryService $service)
    {
        $this->service = $service;
    }

    public function map(SearchRequest $request): Factory|View|Application
    {
        $cemeteries = Cemetery::active()->filtered()->paginate(30);
        $count_filters = $this->countApplyFilters($request->input());

        return view('cemetery.map', compact('cemeteries', 'count_filters'));
    }

    public function list(SearchRequest $request): Factory|View|Application
    {
        $cemeteries = Cemetery::active()->filtered()->paginate(5);
        $count_filters = $this->countApplyFilters($request->input());

        return view('cemetery.list', compact('cemeteries', 'count_filters'));
    }

    public function show(string $slug): Factory|\Illuminate\Contracts\View\View|Application
    {
        $cemetery = Cemetery::query()->where('slug', $slug)->with(['profiles','galleries','socials'])->firstOrFail();
        $memorials = $cemetery->profiles()->paginate(3);
        $famous = $cemetery->profiles()->limit(4)->get();

        return view('cemetery.show', compact('cemetery','memorials', 'famous'));
    }

    private function countApplyFilters(array $filters) : int
    {
        return collect($filters)->filter(function ($value) {
            return !is_null($value);
        })->count();
    }

    public function create(): Factory|\Illuminate\Contracts\View\View|Application
    {
        return view('cemetery.create.create');
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        try {
            $cemetery = $this->service->create($request->validated(), auth()->user()->id);
        } catch (\DomainException $exception) {
            return back()->with('message', $exception->getMessage())->withInput($request->validated());
        }

        return redirect()->route('cemetery.show', ['slug' => $cemetery->slug]);
    }
}
