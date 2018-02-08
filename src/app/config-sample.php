<?php

$cfg = [
    'default_controller'    => 'hello',
    'default_method'        => 'index',

    'base_url'  => '',

    'databases' => [
        'jugaad' => [
            'db_host'   => 'localhost',
            'db_user'   => 'user',
            'db_pass'   => 'password',
            'db_name'   => 'dbname',
        ],
    ],

    'i18n' => [
        'locales' => [
            'en_IN',
        ],
        'languages' => [
            'en' => 'en_IN',
        ],
        // 'gettext' => false,
        'gettext' => [
            'domain' => 'messages',
            'directory' => './locale'
        ]
    ],

    '404_view' => 'http_error',
    '404_data' => ['error_code' => 404],
];

$admins = [
    // List of user ids of admins
    'admin',
];

$keycloak_cfg = [
    'host'           => 'https://felicity.iiit.ac.in/auth/realms/master',
    'server_ca_cert' => APPPATH . 'iiit.ac.in.pem', // Optional, Recommended.
    'client_id'      => 'mainwebsite',
    'client_secret'  => '<secret here>'
];
