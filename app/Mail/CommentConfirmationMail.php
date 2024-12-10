<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $comment;

    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    public function build()
    {
        return $this->view('emails.comment_confirmation')
            ->subject('Bevestiging van je reactie')
            ->from(config('mail.from.address'), config('mail.from.name'));
    }
}
