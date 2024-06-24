<?php
return [
    'database' => [
        'host' => 'localhost:8889',
        'username' => 'root',
        'password' => 'root',
        'database_name' => 'ribellas_boutique',
    ],
    'paths' => [
        'log_directory' => '/var/log/app/', // Anpassen wenn nötig
        'upload_directory' => '/var/www/html/uploads/', // Anpassen wenn nötig
    ],
    'app' => [
        'debug_mode' => true,
        'base_url' => 'http://localhost:8080',
        'login_url' => 'http://localhost:8080/cms-login',
        'admin_credentials' => [
            'username' => 'admin123',
            'password' => 'Test123/*',
        ],
    ],
];
?>