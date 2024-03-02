<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Http\Requests\Community\CreateCommunityRequest;
use App\Models\Community\Community;
use App\Services\Community\CommunityService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CommunityController extends Controller
{
    private CommunityService $service;

    public function __construct(CommunityService $service)
    {
        $this->service = $service;
    }

    public function index(): Factory|View|Application
    {
        $communities = Community::query()->latest()->paginate(4);

        return view('community.index', compact('communities'));
    }

    public function show(string $slug): Factory|View|Application
    {
        /** @var Community $community */
        $community = Community::query()->with(
            [
                'humans', 'users',
                'posts' => function ($query) {
                    $query->with(['author', 'galleries']);
                },
            ]
        )
            ->where('slug', $slug)->firstOrFail();

        $followers = $community->users()->paginate(7);
        $followersCount = $community->users->count();

        $videos = $community->getMedia()->filter(function ($item) {
           return $item->extension === 'mp4';
        });

        return view('community.show',
            compact('community', 'followersCount', 'followers', 'videos'));
    }

    public function create()
    {
        return view('community.create.create');
    }

    public function store(CreateCommunityRequest $request)
    {
        try {
            $community = $this->service->create(\Auth::id(), $request->validated());
        } catch (\DomainException $exception) {
            return back()->with('message', $exception->getMessage());
        }

        return redirect()->route('community.show', $community->slug);
    }
}
