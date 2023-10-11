<?php

namespace Brucelwayne\Contact\Controllers;

use App\Http\Controllers\Controller;
use Brucelwayne\Contact\Mail\NewContactEmail;
use Brucelwayne\Contact\Models\ContactModel;
use Brucelwayne\Contact\Requests\CreateNewContactRequest;
use Hidehalo\Nanoid\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mime\Part\Multipart\AlternativePart;
use Symfony\Component\Mime\Part\TextPart;

class ContactUsController extends Controller
{
    function index(Request $request)
    {
        return $this->renderWithToken();
    }

    function store(CreateNewContactRequest $request)
    {
        $contact_model = ContactModel::createNewContact($request->input());

        $forward_email = config('contact.forward_email');
        if (!empty($forward_email)) {
            Mail::to($forward_email)->send(new NewContactEmail($contact_model));
        }

        session()->flash('success', 'Thank you for your message; we will get in touch with you as soon as possible.');

        return redirect()->back();
    }

    protected function renderWithToken()
    {
        $client = new Client();
        $token = $client->generateId($size = 21, $mode = Client::MODE_DYNAMIC);
        return view('contact::contact.index', [
            'token' => $token,
        ]);
    }
}