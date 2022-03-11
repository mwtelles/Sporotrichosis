<?php

return [
    'name' => 'Esporotricose',
    'manifest' => [
        'name' => env('APP_NAME', 'Notificação de Esporotricose'),
        'short_name' => 'Esporotricose',
        'start_url' => '/dashboard',
        'background_color' => '#ffffff',
        'theme_color' => '#000000',
        'display' => 'standalone',
        'orientation'=> 'any',
        'status_bar'=> 'white',
        'icons' => [
            '72x72' => [
                'path' => '/assets/img/esporo.png',
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => '/assets/img/esporo.png',
                'purpose' => 'any'
            ],
            '128x128' => [
                'path' => '/assets/img/esporo.png',
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => '/assets/img/esporo.png',
                'purpose' => 'any'
            ],
            '152x152' => [
                'path' => '/assets/img/esporo.png',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => '/assets/img/esporo.png',
                'purpose' => 'any'
            ],
            '384x384' => [
                'path' => '/assets/img/esporo.png',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => '/assets/img/esporo.png',
                'purpose' => 'any'
            ],
        ],
        'splash' => [
            '640x1136' => '/assets/img/esporo.png',
            '750x1334' => '/assets/img/esporo.png',
            '828x1792' => '/assets/img/esporo.png',
            '1125x2436' => '/assets/img/esporo.png',
            '1242x2208' => '/assets/img/esporo.png',
            '1242x2688' => '/assets/img/esporo.png',
            '1536x2048' => '/assets/img/esporo.png',
            '1668x2224' => '/assets/img/esporo.png',
            '1668x2388' => '/assets/img/esporo.png',
            '2048x2732' => '/assets/img/esporo.png',
        ],
        'shortcuts' => [
            [
                'name' => 'Esporotricose',
                'description' => 'Notificação de Esporotricose Animal',
                'url' => '/dashboard',
                'icons' => [
                    "src" => "/assets/img/esporo.png",
                    "purpose" => "any"
                ]
            ],
        ],
        'custom' => []
    ]
];
