<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2019-12-11 10:37:40 +0800
 */

if (PHP_SAPI !== 'cli') {
    echo 'Please run the script through cli mode.' . PHP_EOL;
    exit;
}

defined('BASE_DIR') || define('BASE_DIR', dirname(__DIR__));
require BASE_DIR . '/vendor/autoload.php';

$options = [];

$opts = getopt('m:', ['mode:']);
$mode = $opts['m'] ?? ($opts['mode'] ?? 'production');
$modeFile = BASE_DIR . '/build/conf/' . $mode . '.php';
if (is_file($modeFile)) {
    $options = (array) require $modeFile;
}

fwkit\PharBuilder\Builder::build(BASE_DIR, $options);
