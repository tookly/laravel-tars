<?php

return [
    
    'registries' => [
    
    ],
    
//    'log_level' => \Monolog\Logger::INFO,

    'services' => [
        'obj' => [
            'protocolName' => 'http', //http, json, tars or other
            'serverType' => 'http', //http(no_tars default), websocket, tcp(tars default), udp
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
        ]
    ],

    'proto' => [
        'appName' => 'php', //根据实际情况替换
        'serverName' => 'laravelHttpServer', //根据实际情况替换
        'objName' => 'obj', //根据实际情况替换
    ],
    
    'tarsregistry' => 'tars.tarsregistry.QueryObj@tcp -h 172.17.0.11 -p 17890',
];
