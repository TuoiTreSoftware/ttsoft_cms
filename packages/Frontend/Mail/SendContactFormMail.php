<?php

namespace TTSoft\Frontend\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $form;

    public function __construct($form)
    {
        $this->form = $form;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('frontend::emails.contact-form',['info' => $this->form])
            ->bcc(env('MAIL_ADMIN'))
            ->subject('Cảm ơn bạn đã liên hệ chúng tôi');
    }
}
