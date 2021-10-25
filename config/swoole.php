<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2021-10-25 16:34:28 +0800
 */

return [
    // Websocket config.
    'websocket' => [
        'enabled'  => false,
        'handler'  => null,
    ],

    // Schedule tasks.
    // time slots: second minute hour day month week
    // e.g. ['*/5 * * * *', App\Tasks\Demo::class]
    'schedule' => [
        'enabled' => false,
        'list'    => [
        ],
    ],

    // Task queue config.
    'queue' => [
        'enabled'  => false,
        'consumer' => (bool) env('SWOOLE_QUEUE_ENABLE'),
    ],

    // Custom processes.
    'processes' => [],

    // Swoole server options.
    'options' => [
        'log_file'              => __DIR__.'/../runtime/swoole.log',
        'log_level'             => SWOOLE_LOG_DEBUG,
        'max_connection'        => 100,
        'http_parse_post'       => false,
        'package_max_length'    => 5 * 1024 * 1024,
        'open_tcp_nodelay'      => true,
        'open_cpu_affinity'     => true,
        'coroutine_flags'       => SWOOLE_HOOK_ALL,
    ],
];
