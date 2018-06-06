<?php
/**
 * Created by PhpStorm.
 * User: obinnajohnphill
 * Date: 06/06/18
 * Time: 10:33
 */

namespace App\Mail;

use Illuminate\Support\Facades\Mail;


class prepareMail
{
    public function __construct($request)
    {
        $this->data = $request;
    }

    public function sendMail(){
        Mail::to($this->data['email'])
            ->send(new SendMailable($this->data));
    }

}