<?php

declare(strict_types=1);

namespace App\Controllers;

use Pnoexz\Json;
use Slim\Psr7\Response;

abstract class Controller
{
    /**
     * @param \JsonSerializable|array<mixed> $jsonSerializable
     */
    protected function returnJsonResponse(
        Response $response,
        $jsonSerializable,
        int $status = 200
    ): Response {
        $response->getBody()->write(Json::encode($jsonSerializable));
        $allowedHeaders = [
            'Accept',
            'Accept-Language',
            'Content-Language',
            'Content-Type',
        ];

        return $response
            ->withStatus($status)
            ->withHeader('Content-Type', 'application/json')
            ->withAddedHeader('Access-Control-Allow-Origin', '*')
            ->withAddedHeader('Access-Control-Request-Method', 'GET')
            ->withAddedHeader(
                'Access-Control-Allow-Headers',
                implode(', ', $allowedHeaders)
            )
        ;
    }
}
