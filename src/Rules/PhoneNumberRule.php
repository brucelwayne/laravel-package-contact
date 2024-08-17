<?php

namespace Brucelwayne\Contact\Rules;

use Brick\PhoneNumber\PhoneNumber as BrickPhoneNumber;
use Brick\PhoneNumber\PhoneNumberParseException;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PhoneNumberRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!$this->passes($attribute, $value)) {
            $fail($this->message());
        }
    }

    public function passes($attribute, $value): bool
    {
        try {
            BrickPhoneNumber::parse($value);
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
