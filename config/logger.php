<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2021-10-25 16:12:20 +0800
 */

use Teddy\Config\Repository;

return [
    'default'   => 'file',

    'handlers'  => new Repository([
        'stack'      => new Repository([
            'driver'    => 'stack',
            'handlers'  => ['file', 'console'],
        ]),

        'file'      => new Repository([
            'driver'    => 'file',
            'path'      => __DIR__.'/../runtime/teddy.log',
        ]),

        'console'   => new Repository([
            'driver'    => 'file',
            'path'      => 'php://stderr',
        ]),
    ]),
];
