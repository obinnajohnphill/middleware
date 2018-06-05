<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;


class EmailController extends Controller
{

    public function sendEmail()
    {
        $emailJob = (new SendEmailJob())->delay(Carbon::now()->addSeconds(1));
        dispatch($emailJob);

        return Redirect::to('home')->with('message', 'Email successfully sent!');
    }
}