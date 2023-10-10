<?php

namespace Brucelwayne\Contact\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewContactRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|max:190',
            'email' => 'required|email|max:190',
            'phone' => 'required|max:190',
            'title'=> 'required|max:190',
            'content' => 'required|max:2000',
        ];
    }
}