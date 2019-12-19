<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2019-12-19 16:21:16 +0800
 */

defined('BASE_PATH') || define('BASE_PATH', __DIR__ . '/');
defined('IN_SCF') || define('IN_SCF', true);

require BASE_PATH . 'vendor/autoload.php';

function main($event, $context)
{
    static $app;
    if (!isset($app)) {
        $app = require BASE_PATH . 'bootstrap/app.php';
    }

    return $app->run($event, $context);
}
