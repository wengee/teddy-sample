<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2019-12-21 11:19:45 +0800
 */

return [
    'default'   => env('LOG_DEFAULT_DRIVER', 'file'),

    'handlers'  => [
        'file'  => [
            'driver'    => 'file',
            'path'      => env('LOG_FILE', __DIR__ . '/../runtime/app.log'),
        ],
    ],
];
