<?php

namespace App\Listeners;

use App\Events\MonthlyAttendanceEvent;
use App\Notifications\MonthlyAttendance;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class MonthlyAttendanceListener
{

    /**
     * Handle the event.
     */
    public function handle(MonthlyAttendanceEvent $event)
    {
        Notification::send($event->user, new MonthlyAttendance($event->user));
    }

}
