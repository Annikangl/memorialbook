<?php

namespace App\Events;

use App\Models\Profile\Profile;
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

    public const USER_ADDED_PHOTO = 'Добавил новые фотографии';
    public const USER_ADDED_PROFILE = 'Добавил новый профиль';

    public Profile $profile;
    public ?string $action;

    public function __construct(Profile $profile, ?string $action)
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
