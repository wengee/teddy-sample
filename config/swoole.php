<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2021-04-28 10:24:24 +0800
 */

$scheduleEnabled = (bool) env('SWOOLE_SCHEDULE_ENABLE');
$reactorNum      = (int) env('SWOOLE_REACTOR_NUM', 1);
$workerNum       = (int) env('SWOOLE_WORKER_NUM', 1);
$taskWorkerNum   = (int) env('SWOOLE_TASK_WORKER_NUM', 1);
if ($scheduleEnabled) {
    $reactorNum    = (int) env('SWOOLE_SHEDULE_REACTOR_NUM', $reactorNum);
    $workerNum     = (int) env('SWOOLE_SHEDULE_WORKER_NUM', $workerNum);
    $taskWorkerNum = (int) env('SWOOLE_SHEDULE_TASK_WORKER_NUM', $taskWorkerNum);
}

return [
    'host' => env('SWOOLE_HOST', '0.0.0.0'),
    'port' => (int) env('SWOOLE_PORT', 9500),

    // Websocket config.
    'websocket' => [
        'enabled'  => false,
        'handler'  => null,
    ],

    // Schedule tasks.
    // time slots: second minute hour day month week
    // e.g. ['*/5 * * * *', App\Tasks\Demo::class]
    'schedule' => [
        'enabled' => $scheduleEnabled,
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
        'reactor_num'           => $reactorNum,
        'worker_num'            => $workerNum,
        'task_worker_num'       => $taskWorkerNum,
        'dispatch_mode'         => (int) env('SWOOLE_DISPATCH_MODE', 1),
        'log_file'              => env('SWOOLE_LOG_FILE', __DIR__.'/../runtime/swoole.log'),
        'log_level'             => (int) env('SWOOLE_LOG_LEVEL', SWOOLE_LOG_DEBUG),
        'max_connection'        => (int) env('SWOOLE_MAX_CONNECTION', 100),
        'http_parse_post'       => false,
        'package_max_length'    => 5 * 1024 * 1024,
        'open_tcp_nodelay'      => true,
        'open_cpu_affinity'     => true,
        'coroutine_flags'       => SWOOLE_HOOK_ALL | SWOOLE_HOOK_CURL,
    ],
];
