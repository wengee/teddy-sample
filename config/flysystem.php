<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2022-08-20 17:12:09 +0800
 */

use Teddy\Config\Repository;

return [
    'default' => 'local',

    'disks' => [
        'local' => new Repository([
            'driver'     => 'local',
            'location'   => '/data/htdocs/uploaded',
            'url'        => 'https://lvh.me/uploaded',
            'visibility' => 'public',
        ]),

        'oss' => new Repository([
            'driver'          => 'oss',
            'accessKeyId'     => '',
            'accessKeySecret' => '',
            'securityToken'   => null,
            'bucket'          => '',
            'endpoint'        => '',
            'cdnDomain'       => '',
            'ssl'             => true,
            'isCName'         => false,
            'prefix'          => '',
            'timeout'         => 600,
            'connectTimeout'  => 10,
        ]),

        'cos' => new Repository([
            'driver'      => 'cos',
            'region'      => '',
            'bucket'      => '',
            'credentials' => new Repository([
                'secretId'  => '',
                'secretKey' => '',
            ]),
            'cdnDomain' => '',
            'prefix'    => '',
        ]),
    ],
];
