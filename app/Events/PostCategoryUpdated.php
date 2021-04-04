<?php

namespace App\Events;

use App\Models\PostCategory;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostCategoryUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $postCategory;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(PostCategory $postCategory)
    {
        $this->postCategory = $postCategory;
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
