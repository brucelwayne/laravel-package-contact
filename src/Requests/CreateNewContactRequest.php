<?php

namespace Brucelwayne\Contact\Requests;

use Brucelwayne\Contact\Rules\TeamExistsRule;
use Brucelwayne\Contact\Rules\TokenExistsRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateNewContactRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'team_id' => ['sometimes', 'max:32', new TeamExistsRule()],
            'email' => 'required|email|max:190',
            'subject' => 'required|max:190',
            'message' => 'required|max:2000',
            'token' => ['required', 'max:21', new TokenExistsRule()],
            'g-recaptcha-response' => 'recaptcha',
        ];
    }
}