<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DailyScheduleEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userData;
    public $notifiable;

    public function __construct($userData)
    {
        $this->userData = $userData;
    }
}
