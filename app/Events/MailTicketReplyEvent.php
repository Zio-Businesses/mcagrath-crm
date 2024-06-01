<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MailTicketReplyEvent
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $ticketReply;
    public $ticketEmailSetting;

    public function __construct($ticketReply, $ticketEmailSetting)
    {
        $this->ticketReply = $ticketReply;
        $this->ticketEmailSetting = $ticketEmailSetting;
    }

}
