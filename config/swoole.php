<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2019-11-23 10:30:00 +0800
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
    // time slots: second minute hour day month week
    // e.g. ['*/5 * * * *', App\Tasks\Demo::class]
    'schedule' => [
    ],

    // Custom processes.
    'processes' => [],

    // Swoole server options.
    'options' => [
        'reactor_num'           => (int) env('SWOOLE_REACTOR_NUM', 1),
        'worker_num'            => (int) env('SWOOLE_WORKER_NUM', 1),
        'task_worker_num'       => (int) env('SWOOLE_TASK_WORKER_NUM', 1),
        'dispatch_mode'         => (int) env('SWOOLE_DISPATCH_MODE', 1),
        'log_file'              => env('SWOOLE_LOG_FILE', __DIR__ . '/../runtime/swoole.log'),
        'log_level'             => (int) env('SWOOLE_LOG_LEVEL', SWOOLE_LOG_DEBUG),
        'max_connection'        => (int) env('SWOOLE_MAX_CONNECTION', 100),
        'http_parse_post'       => false,
        'package_max_length'    => 5 * 1024 * 1024,
        'open_tcp_nodelay'      => true,
        'open_cpu_affinity'     => true,
        'coroutine_flags'       => SWOOLE_HOOK_ALL | SWOOLE_HOOK_CURL,
    ],
];
