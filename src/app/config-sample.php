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
        'users' => [
            'db_host'   => 'localhost',
            'db_user'   => 'user',
            'db_pass'   => 'password',
            'db_name'   => 'dbname',
        ],
        'sap' => [
            'db_host'   => 'localhost',
            'db_user'   => 'user',
            'db_pass'   => 'password',
            'db_name'   => 'dbname',
        ],
        'contest' => [
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
];

$keycloak_cfg = [
    'host'           => 'https://felicity.iiit.ac.in/auth/realms/master',
    'server_ca_cert' => APPPATH . 'iiit.ac.in.pem', // Optional, Recommended.
    'client_id'      => 'mainwebsite',
    'client_secret'  => '<secret here>'
];

$SECRET_STRING = 'kuchbhi';

$email_cfg = [
    'server_host'   => 'email_server_host_ip',
    'server_domain' => 'email.server.domain.name',
    'server_port'   => 25,
    'smtp_auth'     => true,
    'smtp_secure'   => 'tls',
    'accounts'      => [
        'noreply'   => [
            'username'  => 'email_user',
            'password'  => 'email_user_pass',
            'email'     => 'email_address',
            'from_name' => 'Team Felicity'
        ],
        'noreply_threads'   => [
            'username'      => 'email_user',
            'password'      => 'email_user_pass',
            'email'         => 'email_address',
            'from_name'     => 'Team Felicity',
            'reply_to'      => 'email_reply_to',
            'reply_to_name' => 'Threads Team'
        ]
    ]
];

$payment_cfg = [
    'webdev' => [
        'url'   => '...',
        'salt'  => 'some-very-random-string'
    ],
    'ttt' => [
        'gateway_url'   => '...',
        'salt'  => 'some-very-random-string',
        'nick_field' => 'some-field',
        'api_url' => '...',
        'api_headers' => []
    ]
];
