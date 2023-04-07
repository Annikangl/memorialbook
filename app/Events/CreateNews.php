<?php

namespace App\Events;

use App\Models\Profile\Human\Human;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreateNews
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public const USER_ADDED_PHOTO = 'Added new photos';
    public const USER_ADDED_PROFILE = 'Added new profile';

    public Human $profile;
    public ?string $action;

    public function __construct(Human $profile, ?string $action)
    {
        $this->profile = $profile;
        $this->action = $action;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
