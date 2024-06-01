<?php

namespace App\Listeners;

use App\Events\BulkShiftEvent;
use App\Notifications\BulkShiftNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class BulkShiftListener
{

    public function handle(BulkShiftEvent $event)
    {
        Notification::send($event->userData, new BulkShiftNotification($event->userData, $event->dateRange, $event->userId));
    }

}
