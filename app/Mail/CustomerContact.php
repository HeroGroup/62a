<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerContact extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    public function __construct($inputName,$inputEmail,$inputMessage)
    {
        $this->contact = [
            'name' => $inputName,
            'email' => $inputEmail,
            'message' => $inputMessage
        ];
    }

    public function build()
    {
        return $this->view('emails.customerContact');
    }
}
