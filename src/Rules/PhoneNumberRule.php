<?php

namespace Brucelwayne\Contact\Rules;

use Brick\PhoneNumber\PhoneNumber as BrickPhoneNumber;
use Brick\PhoneNumber\PhoneNumberParseException;
use Illuminate\Contracts\Validation\Rule;

class PhoneNumberRule implements Rule
{
    public function passes($attribute, $value): bool
    {
        try {
            $phone = BrickPhoneNumber::parse($value);
            if (!$phone->isValidNumber()) {
                return false;
            }
            return true;
        } catch (PhoneNumberParseException $e) {
            return false;
        }
    }

    public function message(): string
    {
        return trans('validation.phone');
    }
}