<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2022-03-29 11:17:26 +0800
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
    'pidFile'    => null,
    'logFile'    => null,
    'daemonize'  => false,
    'loop'       => null,
];
