<?php

namespace App\Listeners;

use App\Events\LoginEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use DB;
use Carbon\Carbon;

class LoginListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(LoginEvent $event): void
    {   
        $email=$event->users->email;
        $last_login=Carbon::now();
        DB::insert('insert into LoginDetail (email,lastlogindate) values (?,?)',[$email,$last_login]);
        // dd("success event listener");
    }
}
