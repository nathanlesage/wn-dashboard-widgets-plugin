<?php

return [
    'plugin' => [
        'name' => 'Dashboard Widgets',
        'description' => 'Bietet grundlegende Dashboard-Widgets für das Winter CMS Administrator-Dashboard.',
    ],
    'permissions' => [
        'view' => 'Dashboard Widgets ansehen',
    ],
    'widgets' => [
        'cache' => [
            'title' => 'Cache',
            'clear' => 'Cache leeren',
        ],
        'maintenance' => [
            'title' => 'Wartungsmodus',
            'enable' => 'Wartungsmodus aktivieren',
            'disable' => 'Wartungsmodus deaktivieren',
            'message_enabled' => 'Diese Seite ist derzeit im Wartungsmodus. Besucher sehen die voreingestellte Wartungs-Seite:',
            'message_disabled' => 'Diese Seite ist derzeit live. Besucher können sie regulär besuchen.',
        ],
        'time' => [
            'title' => 'Zeit',
            'server_time' => 'Serverzeit',
            'client_time' => 'Lokale Zeit',
            'server_ahead' => 'Die Serverzeit liegt in der Zukunft.',
            'server_behind' => 'Die Serverzeit liegt in der Vergangenheit.',
            'server_equal' => 'Der Server befindet sich in derselben Zeitzone.'
        ],
    ],
];
