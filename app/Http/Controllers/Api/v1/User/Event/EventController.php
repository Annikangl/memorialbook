<?php

namespace App\Http\Controllers\Api\v1\User\Event;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\Event\PaginateEventCollection;
use Illuminate\Http\Response;

class EventController extends Controller
{
    public function byUser()
    {
        $events = auth()->user()->events()->paginate(25);

        return response()->json([
            'status' => true,
            'events' => PaginateEventCollection::make($events)
        ])->setStatusCode(Response::HTTP_OK);
    }
}
