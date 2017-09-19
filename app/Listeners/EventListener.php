<?php

namespace App\Listeners;

use App\Events\AppointmentReminder;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AppointmentReminder  $event
     * @return void
     */
    public function handle(AppointmentReminder $event)
    {
        echo "yes";die;
    }
}
