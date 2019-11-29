<?php

namespace TTSoft\Frontend\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailStudentRegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $student;

    public function __construct($student)
    {
        $this->student = $student;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('frontend::emails.student',['info' => $this->student])
            ->bcc(env('MAIL_HCT'), env('SUBJECT_HCT'))
            ->subject('Đăng ký khóa học thành công!');
    }
}
