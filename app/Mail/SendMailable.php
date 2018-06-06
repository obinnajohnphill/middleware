<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class SendMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

      /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
      $this->data = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $array = array('message'=> $this->data['message'], 'name' => $this->data['name']);

        return $this->from($this->data['from_email'])
            ->subject($this->data['subject'])
            ->view('email')->with('store', $array);
    }

}