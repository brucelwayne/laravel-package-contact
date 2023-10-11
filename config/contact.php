<?php

return [

    'database' => env('CONTACT_DATABASE','mysql'),

    'table' => env('CONTACT_TABLE','contacts'),

    'team_model' => 'App\Models\Team',

    'forward_email' => env('CONTACT_FORWARD_EMAIL',''),
];