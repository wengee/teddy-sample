<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2019-08-15 10:38:42 +0800
 */

defined('BASE_PATH') || define('BASE_PATH', __DIR__ . '/');

require BASE_PATH . 'vendor/autoload.php';

$app = require BASE_PATH . 'bootstrap/app.php';
$app->listen();
