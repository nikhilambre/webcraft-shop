<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '1208674315884831',
        'client_secret' => '1259b7feb72fe9da6f6d81e694a54772',
        'redirect' => env('APP_URL').'login/facebook/callback',
    ],

    'twitter' => [
        'client_id' => 'your-github-app-id',
        'client_secret' => 'your-github-app-secret',
        'redirect' => 'http://your-callback-url',
    ],

    'google' => [
        'client_id' => '243511681142-3pgbi9t9tt47qsknhnbofof9rm1t62oc.apps.googleusercontent.com',
        'client_secret' => 'PYF-_QASq3h9TG6W3RCqy4iV',
        'redirect' => env('APP_URL').'login/google/callback',
    ],

];
