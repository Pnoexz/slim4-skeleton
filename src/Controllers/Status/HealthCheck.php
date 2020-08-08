<?php

declare(strict_types=1);

namespace App\Controllers\Status;

use App\Controllers\Controller;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class HealthCheck extends Controller
{
    public function __invoke(Request $request, Response $response): Response
    {
        $body = ['status' => true, 'timestamp' => \time()];
        return $this->returnJsonResponse($response, $body);
    }
}
