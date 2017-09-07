<?php

namespace App\Events;

use Cartalyst\Sentinel\Activations\EloquentActivation;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserRegistered
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $code;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(EloquentUser $user, $code)
    {
        $this->user = $user;
        $this->code = $code;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
