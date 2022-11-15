<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Community\Community;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function subscribe(Request $request)
    {
        $user = $request->user();
        $communitySlug = $request->get('slug');

        /** @var Community $community */
        $community = Community::query()->where('slug', $communitySlug)->first();
        $community->users()->attach($user);

        return response()->json([
            'status' => true,
            'user' => $user
        ]);
    }
}
