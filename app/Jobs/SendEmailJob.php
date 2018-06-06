<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\Mail\prepareMail;
//use App\User;


class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $sendEmail = new prepareMail($_REQUEST);
      $sendEmail->sendMail();
    }

    /*

    public function tags()
    {
        $users = User::all()->pluck('id');
        return ['email', 'user:'.$users[0]];
    }

    */
}