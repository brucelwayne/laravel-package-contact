<?php

namespace Brucelwayne\Contact\Listeners;

use Brucelwayne\Contact\Events\NewContactEvent;
use Brucelwayne\Contact\Jobs\SendContactEmailJob;

class SendNewContactEmailListener
{
    public function handle(NewContactEvent $event)
    {
        SendContactEmailJob::dispatch($event->contactModel);
    }
}
