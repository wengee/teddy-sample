<?php
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2019-08-12 14:47:38 +0800
 */

require __DIR__ . '/vendor/autoload.php';
Teddy\PharBuilder::build(__DIR__, [
    'main'      => 'index.php',
    'dist'      => __DIR__ . '/dist',
    'output'    => 'app.phar',

    'directories' => [
        'app',
        'bootstrap',
        'config',
        'routes',
        'vendor'
    ],

    'files' => [
        'index.php',
    ],

    'copy' => [
    ],

    'exclude' => [
        'vendor/bin',
        'vendor/aliyuncs/oss-sdk-php/samples',
        'vendor/aliyuncs/oss-sdk-php/tests',
        'vendor/doctrine/annotations/docs',
        'vendor/funkjedi/composer-include-files',
        'vendor/fwkit/teddy/example',
        'vendor/monolog/monolog/doc',
        'vendor/monolog/monolog/tests',
        'vendor/nesbot/carbon/.github',
        'vendor/nesbot/carbon/bin',
        'vendor/nikic/fast-route/test',
        'vendor/phpoption/phpoption/tests',
        'vendor/ralouphie/getallheaders/tests',
    ],
]);
