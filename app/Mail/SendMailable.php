<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class SendMailable extends Mailable
{
    use Queueable, SerializesModels;

      /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {

    }


    public function parseMessage ($request){

     //$this->request = $request;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('example@example.com')
            ->subject("Heee")
            ->view('email');
    }

}