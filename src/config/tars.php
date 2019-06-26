<?php

return [
    'registries' => [
//        [
//            'type' => 'kong',
//            'url' => env('KONG_UPSTREAM', ''),
//        ]
    ],

//    'log_level' => \Monolog\Logger::INFO,

    'services' => [
        'namespaceName' => 'Lxj\Laravel\Tars\\',
        'monitorStoreConf' => [
            //'className' => Tars\monitor\cache\RedisStoreCache::class,
            //'config' => [
            // 'host' => '127.0.0.1',
            // 'port' => 6379,
            // 'password' => ':'
            //],
            'className' => Tars\monitor\cache\SwooleTableStoreCache::class,
            'config' => [
                'size' => 40960
            ]
        ],
    ],

    'proto' => [
        'appName' => 'php', //根据实际情况替换
        'serverName' => 'laravelHTTPServer', //根据实际情况替换
        'objName' => 'obj', //根据实际情况替换
    ],
];
