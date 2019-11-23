<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2019-11-23 10:26:41 +0800
 */

$origin = env('CORS_ORIGIN', '*');
if (is_string($origin)) {
    $origin = preg_split('#[,\\s]+#', $origin);
}

return [
    'origin'    => $origin,
    'headers'   => [],
];
