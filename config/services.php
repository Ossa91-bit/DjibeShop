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
        'domain' => env('sandbox8787ef1e53654ecca507f47bdb10d603.mailgun.org'),
        'secret' => env('c6014dfafc57b54fab25a42cee780cf8-0be3b63b-5f3dca6c
        '),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],
  
    'paypal' => [
        'username' => env('PAYPAL_USERNAME'),
        'password' => env('PAYPAL_PASSWORD'),
        'signature' => env('PAYPAL_SIGNATURE'),
        'sandbox' => env('PAYPAL_SANDBOX'),
    ],



    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    
    'google' => [
    'client_id' => '863833438491-dscpd8ba1ikfju39n3mbhdmqp575p5fu.apps.googleusercontent.com',
    'client_secret' => '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',
    'redirect' => 'https://localhost/DjibeShop/callback/google',
  ], 

  'facebook' => [
    'client_id' => '670666160756546',
    'client_secret' => '3681cac4409e13f21c673b07865514e5',
    'redirect' =>  'https://localhost/DjibeShop/callback/facebook',
],


];
