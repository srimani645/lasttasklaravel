<?php

namespace App\Providers;
use App\Events\LoginEvent;
use App\Listeners\LoginListener;
use App\Events\UserLoggedIn;
use App\Listeners\LogUserLogin;
use Illuminate\Support\Facades\Event;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    // protected $listen = [
    //     LoginListener::class => [
    //         LoginListener::class,
    //     ],
    // ];
    public function boot()
    {
        // parent::boot();
        Event::listen(
            LoginEvent::class,
            LoginListener::class,
        );
    }
}