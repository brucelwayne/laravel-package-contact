<?php

namespace Brucelwayne\Contact\Mail;

use Brucelwayne\Contact\Models\ContactModel;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    private ContactModel $contact;

    public function __construct(ContactModel $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this
            ->subject('New Contact from ' . config('app.name'))
            ->view('emails.contact.forward')
            ->with([
                'contact' => $this->contact,
            ]);
    }
}
