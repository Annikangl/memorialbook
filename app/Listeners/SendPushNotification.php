<?php

namespace App\Listeners;

use App\Events\CommunityPostCreated;
use App\Models\Event\Event;
use App\Models\User\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Client\Response;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Kutia\Larafirebase\Facades\Larafirebase;

class SendPushNotification
{
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param CommunityPostCreated $event
     * @return Response
     */
    public function handle(CommunityPostCreated $event): Response
    {
        $tokens = $event->tokens;

        if ($event->tokens instanceof Collection) {
            $tokens = $event->tokens->toArray();
        }

        return Larafirebase::withTitle($event->event->title)
            ->withBody($event->event->description)
            ->sendMessage($tokens);
    }
}
