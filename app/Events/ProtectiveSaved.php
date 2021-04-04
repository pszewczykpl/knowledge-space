<?php

namespace App\Events;

use App\Models\Protective;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProtectiveSaved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $protective;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Protective $protective)
    {
        $this->protective = $protective;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //
    }
}
