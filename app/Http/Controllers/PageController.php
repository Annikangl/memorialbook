<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function policy(): Factory|View|Application
    {
        return view('pages.policy');
    }

    public function terms(): Factory|View|Application
    {
        return view('pages.terms');
    }
}
