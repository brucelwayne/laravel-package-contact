<?php

namespace Brucelwayne\Contact\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TeamExistsRule implements ValidationRule
{

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $team_class = app(config('blog.team_model'));
        if (!empty($value) && !empty($team_class)) {
            $team_model = $team_class::where('id', $value)->first();
            if (empty($team_model)){
                //invalid
                $fail('Sorry, the team ID you provided cannot be found.');
            }
        }
    }
}