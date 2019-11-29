<?php

namespace TTSoft\Frontend\Listeners;

use TTSoft\Frontend\Events\NotifyFormContact;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use TTSoft\Frontend\Mail\SendContactFormMail as StudentMail;
use Illuminate\Support\Facades\Mail;
class NotifyFormContactListener
{
    /**
     * Handle the event.
     *
     * @param  NotifyFormContact  $event
     * @return void
     */
    public function handle(NotifyFormContact $event)
    {
        $info = $event->form;
        if (env('QUEUE_DRIVER') == 'database') {
            Mail::to($info->email)->queue(new StudentMail($info));
        }else{
            Mail::to($info->email)->send(new StudentMail($info));
        }
        
    }
}
