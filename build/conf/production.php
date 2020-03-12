<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2020-03-12 15:58:43 +0800
 */

return [
    'main'      => 'index.php',
    'dist'      => BASE_DIR . '/dist',
    'output'    => 'app.phar',

    'directories' => [
        'app',
        'bootstrap',
        'config',
        'migrations',
        'routes',
        'vendor'
    ],

    'files' => [
        'index.php',
    ],

    'copy' => [
    ],

    'ignore' => [
        'vendor/bin',
        'vendor/aliyuncs/oss-sdk-php/samples',
        'vendor/aliyuncs/oss-sdk-php/tests',
        'vendor/doctrine/annotations/docs',
        'vendor/funkjedi/composer-include-files',
        'vendor/fwkit/phar-builder',
        'vendor/fwkit/teddy/.git',
        'vendor/fwkit/teddy/example',
        'vendor/monolog/monolog/doc',
        'vendor/monolog/monolog/tests',
        'vendor/nesbot/carbon/.github',
        'vendor/nesbot/carbon/bin',
        'vendor/nikic/fast-route/test',
        'vendor/phpoption/phpoption/tests',
        'vendor/ralouphie/getallheaders/tests',
    ],
];
