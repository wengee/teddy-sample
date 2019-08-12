<?php
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2019-08-12 14:35:56 +0800
 */

defined('BASE_PATH') || define('BASE_PATH', __DIR__ . '/');

require BASE_PATH . 'vendor/autoload.php';

$app = require BASE_PATH . 'bootstrap/app.php';
$app->listen();
