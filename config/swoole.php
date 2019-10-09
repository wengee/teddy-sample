<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2019-10-09 11:47:09 +0800
 */

return [
    'host' => env('SWOOLE_HOST', '0.0.0.0'),
    'port' => (int) env('SWOOLE_PORT', 9500),

    // Websocket config.
    'websocket' => [
        'enable' => false,
        'handler' => null,
    ],

    // Schedule tasks.
    // e.g. ['*/5 * * * *', App\Tasks\Demo::class]
    'schedule' => [
    ],

    // Custom processes.
    'processes' => [],

    // Swoole server options.
    'options' => [
        'dispatch_mode'         => env('SWOOLE_DISPATCH_MODE', 1),
        'worker_num'            => env('SWOOLE_WORKER_NUM', 1),
        'task_worker_num'       => env('SWOOLE_TASK_WORKER_NUM', 1),
        'http_parse_post'       => false,
        'package_max_length'    => 5242880,
    ],
];
