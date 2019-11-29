<?php

namespace TTSoft\Frontend\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $info;

    public function __construct($info)
    {
        $this->info = $info;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('frontend::emails.order',['info' => $this->info])
            // ->bcc(env('MAIL_ADMIN'), env('SUBJECT_ADMIN'))
            ->subject('Cảm ơn bạn đã đặt hàng tại Viken');
    }
}
