<?php

namespace Brucelwayne\Contact\Listeners;

use Brucelwayne\Contact\Events\NewContactEvent;
use Brucelwayne\Contact\Jobs\SendContactForwardEmailJob;

class SendNewContactEmailListener
{
    public function handle(NewContactEvent $event)
    {
        SendContactForwardEmailJob::dispatch($event->contactModel);
    }
}
