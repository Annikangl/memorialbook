<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\Community\Community;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function show(string $slug): Factory|View|Application
    {
        $community = Community::query()->with(['posts', 'galleries'])
            ->where('slug', $slug)->first();

        return view('community.show', compact('community'));
    }
}
