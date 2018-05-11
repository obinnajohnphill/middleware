<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMailable;
use App\Jobs\SendEmailJob;

use Illuminate\Support\Facades\Redirect;

class ProcessFormController extends Controller
{
    public function processForm(Request $request)
    {
        $pass_address = new SendEmailJob();
        $pass_address->handle($request->input('email'));


       // $send = new SendMailable();
       // $send->parseMessage($request);

        return Redirect::to('email');


    }
}
