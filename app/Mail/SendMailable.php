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
        //dd($this->data);

        $request = $this->data;

        $array = array('message'=>$request->input('message'), 'name' => $request->input('name'));

        return $this->from($request->input('from_email'))
            ->subject($request->input('subject'))
            ->view('email')->with('store', $array); ;
    }

}