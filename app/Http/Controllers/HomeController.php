<?php

namespace App\Http\Controllers;

use App\Models\News\News;
use App\Models\Profile\Human\Human;
use App\Models\Profile\Pet\Pet;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): Factory|View|Application
    {
        $humans = Human::query()->where('user_id', auth()->id())->latest()->get();
        $pets = Pet::query()->where('user_id', auth()->id())->latest()->get();

        $relatives = Human::where('user_id', auth()->id())
            ->withRelatives()->get();

        $news = collect();

        return view('home',
            compact('humans','relatives', 'pets', 'news'));
    }
}
