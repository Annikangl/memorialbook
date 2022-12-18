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
        $humans = Human::byUser(auth()->id())->addSelect('status')->with('media')->latest()->get();
        $pets = Pet::byUser(auth()->id())->latest()->get();

        $relatives = Human::byUser(auth()->id())
            ->withRelatives()->get();

        $news = News::with(['author','galleries','human'])
            ->orderByDesc('created_at')
            ->get();


        return view('home',
            compact('humans','relatives', 'pets', 'news'));
    }
}
