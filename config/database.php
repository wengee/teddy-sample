<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2021-10-25 16:11:11 +0800
 */

use Teddy\Config\Repository;

return [
    'default' => new Repository([
        'driver'   => 'mysql',
        'host'     => '127.0.0.1',
        'port'     => 3306,
        'name'     => 'test',
        'user'     => 'root',
        'password' => 'toor',
        'charset'  => 'utf8mb4',
        'options'  => [],
        'pool'     => [
            'maxConnections' => 2,
        ],
    ]),
];
