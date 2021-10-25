<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2021-10-25 16:08:11 +0800
 */

use Teddy\Config\Repository;

return [
    'name'     => 'Teddy Sample',
    'version'  => '1.0.0',
    'baseUrl'  => 'http://localhost',
    'basePath' => new Repository(__DIR__, Repository::DATA_PROTECTED),
    'debug'    => true,
];
