<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2021-10-25 16:12:38 +0800
 */

use Teddy\Config\Repository;

return [
    'default' => new Repository([
        'host'   => '127.0.0.1',
        'port'   => 6379,
        'prefix' => 'example:',
        'pool'   => [
            'maxConnections' => 2,
        ],
    ]),
];
