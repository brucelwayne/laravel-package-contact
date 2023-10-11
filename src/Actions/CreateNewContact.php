<?php

namespace Brucelwayne\Contact\Actions;

use App\Actions\Fortify\CreateNewUser;
use Ausi\SlugGenerator\SlugGenerator;
use Brucelwayne\Contact\Contacts\ICreateNewContact;
use Brucelwayne\Contact\Models\ContactModel;
use Brucelwayne\Contact\Requests\CreateNewContactRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CreateNewContact implements ICreateNewContact
{
    public function create(array $input)
    {
        $validator = Validator::make($input, (new CreateNewContactRequest())->rules());
        if (!$validator->validate()) {
            return redirect()->back()->withErrors($validator->errors())->send();
        }

        //validate token
        $contact_model = ContactModel::byToken($input['token']);
        if (!empty($contact_model)){
            $validator->errors()->add('token',"We've detected a duplicate submission; please refrain from resubmitting.");
            return redirect()->back()->withErrors($validator->errors())->send();
        }

        //validate team
        $team_id = $input['team_id'];//string from posts
        if (!empty($team)) {
            $team_class = app(config('blog.team_model'));
            if (!empty($team_class)) {
                $team_model = $team_class::where('id', $team)->first();
                if (!empty($team_model)) {
                    $team_id = $team_model->getKey();
                } else {
                    $team_id = 0;//the default team id
                }
            }
        }

        return ContactModel::create([
            'team_id' => $team_id,
            'name' => $input['name'],
            'email' => $input['email'],
            'subject' => $input['subject'],
            'message' => $input['message'],
            'token' => $input['token'],
        ]);
    }
}