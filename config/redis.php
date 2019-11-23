<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2019-11-23 10:28:03 +0800
 */

return [
    'default' => [
        'cluster'   => (bool) env('REDIS_CLUSTER', false),
        'host'      => preg_split('#[\s,;]+#', env('REDIS_HOST', '127.0.0.1')),
        'port'      => (int) env('REDIS_PORT', 6379),
        'dbIndex'   => (int) env('REDIS_DB', 0),
        'prefix'    => env('REDIS_PREFIX', 'sample:'),
        'password'  => env('REDIS_PASSWORD', ''),
    ],
];
