<?php

declare(strict_types=1);

namespace App;

use Slim\Factory\AppFactory;

require_once 'constants.php';
require_once VENDOR_PATH . 'autoload.php';

$containerBuilder = new \DI\ContainerBuilder();
$containerBuilder->useAnnotations(true);
$containerBuilder->addDefinitions(__DIR__ . '/dependencies.php');
$container = $containerBuilder->build();

$app = AppFactory::create(null, $container);

require_once 'routes.php';
