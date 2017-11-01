<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    private $senderName, $senderEmail, $senderSubject, $senderContent;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($senderName, $senderEmail, $senderSubject, $senderContent)
    {
        $this->senderName = $senderName;
        $this->senderEmail = $senderEmail;
        $this->senderSubject = $senderSubject;
        $this->senderContent = $senderContent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from($this->senderEmail)
            ->view('emails.generalcontact')
            ->with([
                'name' => $this->senderName,
                'topic' => $this->senderSubject,
                'content' => $this->senderContent
            ]);
    }
}
