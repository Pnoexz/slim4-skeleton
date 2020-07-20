<?php

declare(strict_types=1);

namespace App;

use App\Controllers\Status\HealthCheck;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;

require_once 'constants.php';
require_once VENDOR_PATH . 'autoload.php';

$containerBuilder = new \DI\ContainerBuilder();
$containerBuilder->useAnnotations(true);
$containerBuilder->addDefinitions(__DIR__ . '/dependencies.php');
$container = $containerBuilder->build();

$app = AppFactory::create(null, $container);

$app->addRoutingMiddleware();
$app->group('/api/v0', static function (RouteCollectorProxy $group): void {
    $group->group('/status', static function (RouteCollectorProxy $group): void {
        $group->get('', HealthCheck::class);
    });
});
