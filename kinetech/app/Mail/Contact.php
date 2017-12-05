<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;
	
	protected $email;

	public function __construct(Request $request) 
	{
		$this->email = $request->all();
    }

    public function build()
    {
        return $this
            ->from($this->email['senderEmail'])
            ->view('emails.generalcontact')
            ->with([
                'name' => $this->email['senderName'],
                'topic' => $this->email['senderSubject'],
                'content' => $this->email['senderContent']
            ]);
    }
}
