<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2022-08-20 17:12:40 +0800
 */

return [
    'host'     => '127.0.0.1',
    'port'     => 9500,
    'crontab'  => true,
    'consumer' => true,

    // Websocket config.
    'websocket' => [
        'enabled' => false,
        'handler' => null,
    ],

    // Task queue config.
    'queue' => [
        'key'          => 'queue:',
        'redis'        => 'default',
        'retrySeconds' => 5,
        'maxAttempts'  => 5,
    ],

    // Swoole server options.
    'options' => [
        'log_file'           => runtime_path('runtime/swoole.log'),
        'log_level'          => SWOOLE_LOG_DEBUG,
        'max_connection'     => 100,
        'http_parse_post'    => false,
        'package_max_length' => 5 * 1024 * 1024,
        'open_tcp_nodelay'   => true,
        'open_cpu_affinity'  => true,
        'coroutine_flags'    => SWOOLE_HOOK_ALL,
    ],
];
