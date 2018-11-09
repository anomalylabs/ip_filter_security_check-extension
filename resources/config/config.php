<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Allowed IPs
    |--------------------------------------------------------------------------
    |
    | Specify the allowed IPs in an array that
    | are allowed to access the control panel.
    |
    */

    'allowed_ips' => array_filter(explode(',', env('ALLOWED_IPS', ''))),
];
