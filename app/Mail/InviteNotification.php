<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InviteNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $vacancy;
    public $appointment;

    public function __construct($name, $vacancy, $appointment)
    {
        $this->name = $name;
        $this->vacancy = $vacancy;
        $this->appointment = $appointment;
    }

    public function build()
    {
        return $this->view('emails.invite-notification')
            ->with([
                'name' => $this->name,
                'vacancy' => $this->vacancy,
                'appointment' => $this->appointment,
            ]);
    }
}
