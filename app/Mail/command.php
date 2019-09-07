<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class command extends Mailable
{
    use Queueable, SerializesModels;
    public $email ;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        //
        $this->email=$request ;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'wiemfourati@outlook.fr';
        $name = 'ExaDev';
      $subject = 'ExaDev contact service';
      return $this->view('emails.command',compact('email'))
      ->from($address, $name)
      ->subject($subject);
    }
    
}
