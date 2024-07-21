<?php

return [
    'default' => env('DEFAULT_SMS_PROVIDER', 'first'),

    'providers' => [
        'first' => [
            'url'       => env('FIRST_SMS_URL'),
            'username'  => env('FIRST_SMS_USERNAME'),
            'password'  => env('FIRST_SMS_PASSWORD'),
            'receptor'  => env('FIRST_SMS_RECEPTOR'),
        ],
        'second' => [
            'url'       => env('SECOND_SMS_URL'),
            'username'  => env('SECOND_SMS_USERNAME'),
            'password'  => env('SECOND_SMS_PASSWORD'),
            'receptor'  => env('SECOND_SMS_RECEPTOR'),
        ],
        'third' => [
            'url'       => env('THIRD_SMS_URL'),
            'username'  => env('THIRD_SMS_USERNAME'),
            'password'  => env('THIRD_SMS_PASSWORD'),
            'receptor'  => env('THIRD_SMS_RECEPTOR'),
        ],
    ],
];
