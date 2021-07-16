<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Support extends Mailable
{
    use Queueable, SerializesModels;

    public $responseText;

    public function __construct($rspnsTxt)
    {
        $this->responseText = $rspnsTxt;
    }


    public function build()
    {
        return $this->view('emails.supportRespond');
    }
}
