<?php

declare(strict_types=1);

namespace App;

define('ROOT_PATH', \dirname(__DIR__) . '/');
define('VENDOR_PATH', \dirname(__DIR__) . '/vendor/');
define('APP_PATH', \dirname(__DIR__) . '/app/');
define('PUBLIC_PATH', \dirname(__DIR__) . '/public/');
define('CLI', PHP_SAPI === 'cli');
