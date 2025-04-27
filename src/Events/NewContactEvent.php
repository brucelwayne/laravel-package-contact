<?php

namespace Brucelwayne\Contact\Events;

use Brucelwayne\Contact\Models\ContactModel;

class NewContactEvent
{
    public ContactModel $contactModel;

    public function __construct(ContactModel $contactModel)
    {
        $this->contactModel = $contactModel;
    }
}
