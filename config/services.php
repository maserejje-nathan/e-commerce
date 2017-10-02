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
        'client_id' => '116778725571050',
        'client_secret' => 'b86114d5a46124c952bcbbd3763861e3',
        'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],

    'twitter' => [
        'client_id' => '4eVtYXdlz5IYKoI0dEGdc7kg5',
        'client_secret' => 'tiJqdmcp9FRQbWmN2AnR4dcZFDFqgqsl0eLJohyuAHo7Ixr9rk',
        'redirect' => 'http://www.whitefalconug.com/login/twitter/callback',
    ],
    'google' => [
        'client_id' => '406297385044-601ae2480tt8ou5erg32kp2k7u043vmo.apps.googleusercontent.com',
        'client_secret' => 'bZJiQMM9m3vKwC3UDhvueuqB',
        'redirect' => 'http://www.whitefalconug.com/login/google/callback',
    ],




];
