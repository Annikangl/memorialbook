<?php

namespace App\Http\Controllers\Api\v1\User;

use App\Http\Controllers\Controller;
use App\Models\Profile\Human\Religion;
use Illuminate\Http\Response;

class ReligionController extends Controller
{
    public function index()
    {
        return response()->json(['status' => true, 'religions' => Religion::all()])
            ->setStatusCode(Response::HTTP_OK);
    }
}
