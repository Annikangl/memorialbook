<?php

namespace App\Http\Controllers\Api\v1\Attributes;

use App\Http\Controllers\Controller;
use App\Http\Resources\Attributes\ReligionResource;
use App\Models\Profile\Religion;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReligionController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'status' => true,
            'religions' => ReligionResource::collection(Religion::all())
        ])->setStatusCode(Response::HTTP_OK);
    }
}
