<?php

return [
    'name' => 'Fast Food App',
    'manifest' => [
        'name' => 'Fast Food App',
        'short_name' => 'Fast Food',
        'start_url' => '/',
        'background_color' => '#047fb8',
        'theme_color' => '#ffffff',
        'display' => 'standalone',
        'orientation'=> 'any',
        'status_bar'=> 'black',
		"description" => "Fast Food App to enjoy meals from your favourite restaurants.",
		"dir" => "ltr",
		"lang" => "en",
        'icons' => [
            '72x72' => [
                'path' => '/images/icons/icon-72x72.png',
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => '/images/icons/icon-96x96.png',
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => '/images/icons/icon-144x144.png',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => '/images/icons/icon-512x512.png',
                'purpose' => 'any'
            ],
        ],
        'splash' => [
            '620x300' => '/images/icons/splash-620x300.png',
            '775x375' => '/images/icons/splash-775x375.png',
            '930x450' => '/images/icons/splash-930x450.png',
            '1240x600' => '/images/icons/splash-1240x600.png',
            '2480x1200' => '/images/icons/splash-2480x1200.png',
        ],
        'shortcuts' => [
            [
                'name' => 'Shortcut Link 1',
                'description' => 'Shortcut Link 1 Description',
                'url' => '/shortcutlink1',
                'icons' => [
                    "src" => "/images/icons/icon-72x72.png",
                    "purpose" => "any"
                ]
            ],
            [
                'name' => 'Shortcut Link 2',
                'description' => 'Shortcut Link 2 Description',
                'url' => '/shortcutlink2'
            ]
        ],
        'custom' => []
    ]
];
