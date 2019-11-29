<?php 
return [
    'modules' => 'AlepayPayment',
    'alepay' => [
    	'token_key' => env('ALEPAY_TOKEN_KEY'),
    	'checksum_key' => env('ALEPAY_CHECKSUM_KEY'),
    	'encrypt_key' => env('ALEPAY_ENCRYPT_KEY'),
    	'base_url' => env('ALEPAY_BASE_URL')
    ]
];