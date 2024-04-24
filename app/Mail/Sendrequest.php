<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Sendrequest extends Mailable
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
        return $this->view('emails.requestmsg')
                    ->subject('You have new friend request!');
    }
}