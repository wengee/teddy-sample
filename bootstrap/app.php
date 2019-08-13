<?php
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2019-08-12 14:37:30 +0800
 */

$app = Teddy\App::create(defined('BASE_PATH') ? BASE_PATH : dir(__DIR__));

$app->bind('request', App\Http\Request::class);
$app->bind('response', App\Http\Response::class);

$app->addErrorMiddleware(false, false, false);

$app->addEventListeners([
]);

return $app;
