<?php

return [
    'plugin' => [
        'name' => 'Dashboard Widgets',
        'description' => 'Provides a basic set of widgets for the Winter CMS admin dashboard.',
    ],
    'permissions' => [
        'view' => 'View dashboard widgets',
    ],
    'widgets' => [
        'cache' => [
            'title' => 'Cache',
            'clear' => 'Clear Cache',
        ],
        'maintenance' => [
            'title' => 'Maintenance Mode',
            'enable' => 'Enable Maintenance Mode',
            'disable' => 'Disable Maintenance Mode',
            'message_enabled' => 'This site is currently in maintenance mode. Your visitors will see the configured maintenance page:',
            'message_disabled' => 'This site is currently live. Your visitors can browse it normally.',
        ],
        'time' => [
            'title' => 'Time',
            'server_time' => 'Server Time',
            'client_time' => 'Local Time',
            'server_ahead' => 'The server is ahead of you.',
            'server_behind' => 'The server is behind you.',
            'server_equal' => 'The server is in the same timezone.'
        ],
    ],
];
