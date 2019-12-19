<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2019-12-19 17:11:56 +0800
 */

$options = require __DIR__ . '/production.php';
$options['output'] = false;
$options['dist'] = BASE_DIR . '/dist_scf';
$options['copy']['scf.php'] = 'index.php';
$options['ignore'][] = 'config/swoole.php';
return $options;
