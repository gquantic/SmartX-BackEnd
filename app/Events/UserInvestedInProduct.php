<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserInvestedInProduct
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user, $params;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, array $params)
    {
        $this->user = $user;
        $this->params = $params;
    }
}
