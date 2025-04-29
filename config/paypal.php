<?php
/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */

return [
    'client_id' => env('PAYPAL_CLIENT_ID', 'YOUR_SANDBOX_CLIENT_ID'),
    'secret' => env('PAYPAL_SECRET', 'YOUR_SANDBOX_SECRET'),
    'settings' => [
       'mode' => env('PAYPAL_MODE', 'sandbox'), // Can be 'sandbox' or 'live'
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path('/logs/paypal.log'),
        'log.LogLevel' => 'INFO', // Available options: 'INFO', 'WARN' or 'ERROR'
    ],
];
