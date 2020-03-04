<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2020-03-04 14:26:39 +0800
 */

defined('BASE_PATH') || define('BASE_PATH', __DIR__ . '/');
defined('TEDDY_RUNTIME') || define('TEDDY_RUNTIME', 'scf');

require BASE_PATH . 'vendor/autoload.php';
GuzzleHttp\DefaultHandler::set('curl');

function main($event, $context)
{
    static $app;
    if (!isset($app)) {
        $app = require BASE_PATH . 'bootstrap/app.php';
        $app->addStaticFileMiddleware(BASE_PATH . 'public');
    }

    return $app->run($event, $context);
}
