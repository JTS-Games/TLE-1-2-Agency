<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VacancyRegistrationConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $vacancy;

    /**
     * Create a new message instance.
     *
     * @param $vacancy
     */
    public function __construct($vacancy)
    {
        $this->vacancy = $vacancy;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Bevestiging van je aanmelding')
            ->view('emails.vacancy-registration-confirmation');
    }
}
