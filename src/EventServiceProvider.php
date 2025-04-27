<?php

namespace Brucelwayne\Contact;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        \Brucelwayne\Contact\Events\NewContactEvent::class => [
            \Brucelwayne\Contact\Listeners\SendNewContactEmailListener::class,
        ],
    ];
}
