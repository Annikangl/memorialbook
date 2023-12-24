<?php

namespace App\Events;

use App\Models\Community\Posts\Post;
use App\Models\Event\Event;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class CommunityPostCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public Post $post, public Event $event, public Collection|array|null $tokens = null)
    {
        //
    }
}
