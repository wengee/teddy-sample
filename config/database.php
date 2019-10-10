<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2019-10-10 09:44:48 +0800
 */

$defaultDbConf = [
    'engine'    => 'mysql',
    'host'      => preg_split('#[\s,;]+#', env('DB_HOST', '127.0.0.1')),
    'port'      => (int) env('DB_PORT', 3306),
    'name'      => env('DB_NAME', 'test'),
    'user'      => env('DB_USER', 'root'),
    'password'  => env('DB_PASSWORD', 'toor'),
    'charset'   => env('DB_CHARSET', 'utf8mb4'),
    'options'   => [],
];

$writeDbHost = env('DB_WRITE_HOST');
$readDbHost = env('DB_READ_HOST');
if ($writeDbHost && $readDbHost) {
    $defaultDbConf = [
        'write' => [
            'engine'    => 'mysql',
            'host'      => preg_split('#[\s,;]+#', $writeDbHost),
            'port'      => (int) env('DB_WRITE_PORT', 3306),
            'name'      => env('DB_WRITE_NAME', 'test'),
            'user'      => env('DB_WRITE_USER', 'root'),
            'password'  => env('DB_WRITE_PASSWORD', 'toor'),
            'charset'   => env('DB_WRITE_CHARSET', 'utf8mb4'),
            'options'   => [],
        ],

        'read' => [
            'engine'    => 'mysql',
            'host'      => preg_split('#[\s,;]+#', $readDbHost),
            'port'      => (int) env('DB_READ_PORT', 3306),
            'name'      => env('DB_READ_NAME', 'test'),
            'user'      => env('DB_READ_USER', 'root'),
            'password'  => env('DB_READ_PASSWORD', 'toor'),
            'charset'   => env('DB_READ_CHARSET', 'utf8mb4'),
            'options'   => [],
        ],
    ];
}


return [
    'default' => $defaultDbConf,
];
