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
            'captcha' => 'required|captcha',  // 验证验证码
            'token' => 'required|string|max:32',  // 验证验证码
        ];
    }

    public function messages(): array
    {
        return [
            'captcha.captcha' => '验证码不正确。',
        ];
    }
}