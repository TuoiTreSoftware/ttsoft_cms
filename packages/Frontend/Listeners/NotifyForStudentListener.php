<?php

namespace TTSoft\Frontend\Listeners;

use TTSoft\Frontend\Events\NotifyForStudent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use TTSoft\Frontend\Mail\SendMailStudentRegisterMail as StudentMail;
use Illuminate\Support\Facades\Mail;
class NotifyForStudentListener
{
    /**
     * Handle the event.
     *
     * @param  NotifyForStudent  $event
     * @return void
     */
    public function handle(NotifyForStudent $event)
    {
        $student = $event->student;
        if (env('QUEUE_DRIVER') == 'database') {
            Mail::to($student->email)->send(new StudentMail($student));
        }else{
            Mail::to($student->email)->queue(new StudentMail($student));
        }
    }
}
