<?php

return [

    'database' => env('CONTACT_DATABASE', 'mysql'),

    'table' => env('CONTACT_TABLE', 'blw_contacts'),

    'team_model' => 'App\Models\Team',

    'forward_email' => collect(explode(',', env('CONTACT_FORWARD_EMAIL', '')))
        ->map(fn($email) => trim($email))
        ->filter(fn($email) => filter_var($email, FILTER_VALIDATE_EMAIL))
        ->values()
        ->all(),
];