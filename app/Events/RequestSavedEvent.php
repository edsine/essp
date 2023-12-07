<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use App\Models\Request;

class RequestSavedEvent
{
    use SerializesModels;

    public $request;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
