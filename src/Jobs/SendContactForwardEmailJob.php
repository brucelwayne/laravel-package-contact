<?php

namespace Brucelwayne\Contact\Jobs;

use Brucelwayne\Contact\Mail\NewContactEmail;
use Brucelwayne\Contact\Models\ContactModel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendContactForwardEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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

        if (!empty($forwardEmails)) {
            foreach ($forwardEmails as $email) {
                Mail::to($email)
                    ->send(new NewContactEmail($this->contactModel));
            }
        }
    }
}
