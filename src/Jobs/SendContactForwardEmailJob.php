<?php

namespace Brucelwayne\Contact\Jobs;

use Brucelwayne\Admin\Traits\HasMultipleEmailToSend;
use Brucelwayne\Contact\Mail\NewContactEmail;
use Brucelwayne\Contact\Models\ContactModel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendContactForwardEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, HasMultipleEmailToSend;

    protected $contactModel;

    /**
     * Create a new job instance.
     */
    public function __construct(ContactModel $contactModel)
    {
        $this->contactModel = $contactModel;
        $this->onQueue('email');
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $forwardEmails = config('contact.forward_email');
        $this->sendToMultipleEmails(new NewContactEmail($this->contactModel), $forwardEmails);
    }
}
