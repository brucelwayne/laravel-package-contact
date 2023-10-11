<?php

namespace Brucelwayne\Contact\Rules;

use Brucelwayne\Contact\Models\ContactModel;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TokenExistsRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $contact_model = ContactModel::byToken($value);
        if (!empty($contact_model)){
           $fail("We've detected a duplicate submission; please refrain from resubmitting.");
        }
    }
}