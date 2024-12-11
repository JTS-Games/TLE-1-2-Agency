<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function build()
    {
        return $this->view('emails.test') // Maak een eenvoudige view emails/test.blade.php
        ->subject('Test Email')
            ->from(config('mail.from.address'), config('mail.from.name'));
    }
}
