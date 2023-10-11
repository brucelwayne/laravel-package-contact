<?php

namespace Brucelwayne\Contact\Mail;

use Brucelwayne\Contact\Models\ContactModel;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    private ContactModel $contact;

    function __construct(ContactModel $contact)
    {
        $this->contact = $contact;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Contact info from '.config('app.name'),
        );
    }

    public function content()
    {
        return new Content(
            view: 'contact::mail.new-contact',
            with: ['contact' => $this->contact],
        );
    }

}