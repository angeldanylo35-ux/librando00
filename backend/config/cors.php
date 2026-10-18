<?php

// config/cors.php (Laravel já vem com esse arquivo, só ajuste 'allowed_origins')

return [
    'paths' => ['api/*'],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
    'http://localhost:5173',
    'https://librando-frontend.onrender.com',
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,
];
