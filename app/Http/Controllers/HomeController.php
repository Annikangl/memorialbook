<?php

namespace App\Http\Controllers;

use App\Models\News\News;
use App\Models\Profile\Profile;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): Factory|View|Application
    {
        $profiles = Profile::byUser(auth()->id())->addSelect('status')->get();

        $relatives = Profile::byUser(auth()->id())
            ->withRelatives()->get();

        $pets = Profile::pets()->get();

        $news = News::with(['author','galleries','profile'])
            ->orderByDesc('created_at')
            ->get();

        return view('home',
            compact('profiles','relatives', 'pets', 'news'));
    }
}
