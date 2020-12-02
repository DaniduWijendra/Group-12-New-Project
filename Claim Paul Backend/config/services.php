<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '211102730909-kb2j91iflkcj2nceo3n93mr8h1soqjuu.apps.googleusercontent.com',
        'client_secret' => 'tYshIozSJG7JNvYxnQmV2FKY',
        'redirect' => 'http://127.0.0.1:8000/api/login/google/callback',
    ],
    'facebook' => [
        'client_id' => '227761922112682',
        'client_secret' => '25fca73164d03d358a92de84e8f0db96',
        'redirect' => 'http://localhost:8000/api/login/facebook/callback',
    ],

];
