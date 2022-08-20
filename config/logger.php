<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2022-08-20 17:12:23 +0800
 */

use Teddy\Config\Repository;

return [
    'default' => 'file',

    'handlers' => new Repository([
        'stack' => new Repository([
            'driver'   => 'stack',
            'handlers' => ['file', 'console'],
        ]),

        'file' => new Repository([
            'driver' => 'file',
            'path'   => runtime_path('runtime/teddy.log'),
        ]),

        'console' => new Repository([
            'driver' => 'file',
            'path'   => 'php://stderr',
        ]),
    ]),
];
