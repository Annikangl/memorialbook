<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Http\Requests\Community\CreateCommunityRequest;
use App\Models\Community\Community;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CommunityController extends Controller
{
    public function index(): Factory|View|Application
    {
        $communities = Community::query()->paginate(4);

        return view('community.index', compact('communities'));
    }

    public function show(string $slug): Factory|View|Application
    {
        /** @var Community $community */
        $community = Community::query()->with(
            [
                'humans', 'galleries', 'users',
                'posts' => function ($query) {
                    $query->with(['author', 'galleries']);
                },
            ]
        )
            ->where('slug', $slug)->first();

        $followers = $community->users()->paginate(7);
        $followersCount = $community->users->count();

        $videos = $community->galleries->filter(function ($item) {
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
        $request_data = $request->validated();
        dd($request_data);
    }
}
