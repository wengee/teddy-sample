<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2020-03-20 17:19:47 +0800
 */

defined('BASE_PATH') || define('BASE_PATH', dirname(__DIR__) . '/');
defined('TEDDY_RUNTIME') || define('TEDDY_RUNTIME', 'fpm');

require BASE_PATH . 'vendor/autoload.php';

$app = require BASE_PATH . 'bootstrap/app.php';
$app->run();
