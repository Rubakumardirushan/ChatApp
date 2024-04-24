<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Sendaccept extends Mailable
{
    use Queueable, SerializesModels;

    public $sender;
    public $receiver;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sender, $receiver)
    {
        $this->sender = $sender;
        $this->receiver = $receiver;
    }
    

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.accpectmsg')
                    ->subject('Your frnd request has been accepted!');
    }
}