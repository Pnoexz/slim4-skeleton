<?php

namespace App;

use App\Controllers\Status\HealthCheck;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

/** @var App $app */
$app->addRoutingMiddleware();
$app->group('/api/v0', function (RouteCollectorProxy $group): void {
    $group->group('/status', function (RouteCollectorProxy $group): void {
        $group->get('', HealthCheck::class);
    });
});
