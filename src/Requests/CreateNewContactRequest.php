<?php

namespace Brucelwayne\Contact\Requests;

use Brucelwayne\Contact\Rules\PhoneNumberRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateNewContactRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|max:190|email',
            'phone' => ['required', 'max:190', new PhoneNumberRule],
            'type' => 'required|max:190',
            'message' => 'required|max:2000',
        ];
    }
}