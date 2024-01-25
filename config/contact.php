<?php

return [

    'database' => env('CONTACT_DATABASE','mysql'),

    'table' => env('CONTACT_TABLE','blw_contacts'),

    'team_model' => 'App\Models\Team',

    'forward_email' => env('CONTACT_FORWARD_EMAIL',''),
];