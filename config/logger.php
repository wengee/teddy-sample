<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2019-10-09 11:47:09 +0800
 */

return [
    'handlers' => [
        'file' => [
            'path' => env('LOG_FILE', __DIR__ . '/../runtime/app.log'),
        ],
    ],
];
