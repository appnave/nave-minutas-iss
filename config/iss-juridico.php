<?php

return [
    'base_uri' => env('MS_JURIDICO_BASE_URI', 'https://contratos-server.nave.dev.br'),
    'prefix' => env('MS_JURIDICO_API_PREFIX', 'api'),

    'db' => [
        'url' => env('MS_JURIDICO_DB_URL'),
        'host' => env('MS_JURIDICO_DB_HOST'),
        'port' => env('MS_JURIDICO_DB_PORT'),
        'database' => env('MS_JURIDICO_DB_DATABASE'),
        'username' => env('MS_JURIDICO_DB_USERNAME'),
        'password' => env('MS_JURIDICO_DB_PASSWORD'),
    ],
];
