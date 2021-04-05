<?php

namespace App\Events;

use App\Models\FileCategory;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FileCategoryDeleted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $fileCategory;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(FileCategory $fileCategory)
    {
        $this->fileCategory = $fileCategory;
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
