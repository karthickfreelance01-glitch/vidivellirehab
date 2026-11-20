<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public array $data)
    {
    }

    public function build()
    {
        return $this->subject('New enquiry from '.$this->data['name'].' — '.$this->data['service'])
            ->replyTo($this->data['email'], $this->data['name'])
            ->view('emails.enquiry');
    }
}
