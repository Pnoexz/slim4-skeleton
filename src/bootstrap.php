<?php

declare(strict_types=1);

namespace App;

use App\Controllers\Status\HealthCheck;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;

require_once 'constants.php';
require_once VENDOR_PATH . 'autoload.php';

$app = AppFactory::create();

$app->addRoutingMiddleware();
$app->group('/api/v0', static function (RouteCollectorProxy $group): void {
    $group->group('/status', static function (RouteCollectorProxy $group): void {
        $group->get('', HealthCheck::class);
    });
});
