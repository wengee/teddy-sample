<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2019-10-09 11:47:09 +0800
 */

return [
    'default' => [
        'host' => preg_split('#[\s,;]+#', env('REDIS_HOST', '127.0.0.1')),
        'port' => (int) env('REDIS_PORT', 6379),
        'dbIndex'   => (int) env('REDIS_DB', 0),
        'prefix' => env('REDIS_PREFIX', 'sample:'),
        'password'  => env('REDIS_PASSWORD', ''),
    ],
];
