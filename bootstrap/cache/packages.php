<?php return [
    'facade/ignition'               => [
        'providers'  => [
            0 => 'Facade\\Ignition\\IgnitionServiceProvider',
        ], 'aliases' => [
            'Flare' => 'Facade\\Ignition\\Facades\\Flare',
        ],
    ], 'fideloper/proxy'            => [
        'providers' => [
            0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
        ],
    ], 'fruitcake/laravel-cors'     => [
        'providers' => [
            0 => 'Fruitcake\\Cors\\CorsServiceProvider',
        ],
    ], 'laravel/socialite'          => [
        'providers'  => [
            0 => 'Laravel\\Socialite\\SocialiteServiceProvider',
        ], 'aliases' => [
            'Socialite' => 'Laravel\\Socialite\\Facades\\Socialite',
        ],
    ], 'laravel/tinker'             => [
        'providers' => [
            0 => 'Laravel\\Tinker\\TinkerServiceProvider',
        ],
    ], 'nesbot/carbon'              => [
        'providers' => [
            0 => 'Carbon\\Laravel\\ServiceProvider',
        ],
    ], 'nunomaduro/collision'       => [
        'providers' => [
            0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
        ],
    ], 'socialiteproviders/manager' => [
        'providers' => [
            0 => 'SocialiteProviders\\Manager\\ServiceProvider',
        ],
    ],
];