<?php

namespace TTSoft\Contact\Listeners;

use TTSoft\Contact\Events\EventLogin;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth as Authenticate;


class EventLoginListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(){}

    /**
     * Handle the event.
     *
     * @param  EventLogin  $event
     * @return void
     */
    public function handle(EventLogin $event)
    {
        $credentials = $event->data;
        if (Authenticate::attempt($credentials , request()->has('remember'))) 
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
