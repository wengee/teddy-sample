<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2022-08-20 17:14:21 +0800
 */

use App\Http\Request;
use App\Http\Response;
use App\Providers\Renderer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Teddy\Application;
use Teddy\Auth\Authentication;
use Teddy\Container\DefaultContainer;
use Teddy\Interfaces\AuthHandlerInterface;

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

$app->add(new Authentication(new class() implements AuthHandlerInterface {
    public function handle(ServerRequestInterface $request, array $payload): ServerRequestInterface
    {
        return $request;
    }
}));

return $app;
