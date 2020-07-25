<?php

namespace App;

//use Dotenv\Dotenv;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

$config = [
    'baseUrl' => '/',
];

return [
    'config' => $config,
    'logger' => function () {
        $logger = new Logger('');
        $logger->pushHandler(
            new StreamHandler('php://STDOUT')
        );

        return $logger;
    },
];
