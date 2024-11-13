<?php

return [
    'merchant_id' => env('MIDTRANS_MERCHANT_ID', 'G1212111'),
    'server_key' => env('MIDTRANS_SERVER_KEY', 'SB-Mid-server-KIZ6YwG2oALo8GsEvidginGt'),
    'client_key' => env('MIDTRANS_CLIENT_KEY', 'SB-Mid-client-eZlJnfM2tilCAas4'),
    'is_production' => false, 
    'is_sanitized' => true,
    'is_3ds' => true,
];
