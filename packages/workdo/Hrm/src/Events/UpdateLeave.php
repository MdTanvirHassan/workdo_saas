<?php

namespace Workdo\Hrm\Events;

use Illuminate\Queue\SerializesModels;

class UpdateLeave
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $request;
    public $leave;

    public function __construct($leave, $request)
    {
        $this->request = $request;
        $this->leave = $leave;
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
