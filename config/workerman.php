<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2022-08-20 17:12:59 +0800
 */

return [
    'http' => [
        'host'       => '127.0.0.1',
        'port'       => 9500,
        'count'      => 1,
        'reusePort'  => false,
        'reloadable' => true,
    ],

    'task' => [
        'host'       => '127.0.0.1',
        'port'       => null,
        'sock'       => null,
        'count'      => 1,
        'reusePort'  => false,
        'reloadable' => true,
        'crontab'    => true,
        'consumer'   => true,
        'queue'      => [
            'key'          => 'queue:',
            'redis'        => 'default',
            'retrySeconds' => 5,
            'maxAttempts'  => 5,
        ],
    ],

    'stdoutFile' => null,
    'pidFile'    => runtime_path('runtime/app.pid'),
    'logFile'    => runtime_path('runtime/workerman.log'),
    'daemonize'  => false,
    'loop'       => null,
];
