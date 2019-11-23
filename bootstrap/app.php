<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2019-11-23 10:26:21 +0800
 */

use Teddy\Middleware\CORSMiddleware;

$app = Teddy\App::create(defined('BASE_PATH') ? BASE_PATH : dirname(__DIR__));

$app->bind('request', App\Http\Request::class);
$app->bind('response', App\Http\Response::class);
$app->bind('renderer', App\Providers\Renderer::class);

$app->addErrorMiddleware(
    config('app.debug'),
    true,
    true
);

$app->add(new CORSMiddleware(config('cors', [])));
$app->addEventListeners([
]);

return $app;
