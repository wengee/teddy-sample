<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2021-10-25 16:37:23 +0800
 */

use Teddy\Routing\RouteCollectorProxy;

/** @var RouteCollectorProxy $router */
$router->get('[/]', 'IndexController:index');
$router->post('[/]', 'IndexController:index');
