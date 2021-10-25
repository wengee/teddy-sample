<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2021-10-25 16:04:36 +0800
 */

use App\Http\Request;
use App\Http\Response;
use App\Providers\Renderer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Teddy\Application;
use Teddy\Container\DefaultContainer;

$container = DefaultContainer::create(defined('BASE_PATH') ? BASE_PATH : dirname(__DIR__));
$container->add(ServerRequestInterface::class, Request::class);
$container->add(ResponseInterface::class, Response::class);

$container->addShared('renderer', Renderer::class);

$app = Application::create($container);
$app->addRoutingMiddleware();
$app->addBodyParsingMiddleware([]);
$app->addErrorMiddleware(config('app.debug'), true, true);
$app->addStaticFileMiddleware(dirname(__DIR__).'/public');
$app->addCorsMiddleware();

return $app;
