<?php
return [
    'token' => env('MAILER_TOKEN'),
    'apiDomain' => env('MAILER_DOMAIN'),
    'apiUrl' => '/api/send',
    'from'=> env('MAILER_EMAIL_FROM'),
    'appName'=> env('APP_NAME'),
    'appURL'=> env('APP_URL'),
    'domain' => env('APP_DOMAIN'),
    'mailer' => env('MAILER_MAILER'),
];
