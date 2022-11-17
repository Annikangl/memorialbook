<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\Community\Community;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CommunityController extends Controller
{
    public function index(): Factory|View|Application
    {
        $communities = Community::byUser(auth()->id())->paginate(15);

        return view('community.index', compact('communities'));
    }

    public function show(string $slug): Factory|View|Application
    {
        $community = Community::query()->with(['posts' => function ($query) {
            $query->with(['author', 'galleries']);
        }, 'galleries', 'users'])
            ->where('slug', $slug)->first();

        $followers = $community->users()->paginate(7);
        $followersCount = $community->users->count();

        return view('community.show',
            compact('community', 'followersCount', 'followers'));
    }
}
