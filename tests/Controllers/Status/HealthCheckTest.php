<?php

declare(strict_types=1);

namespace Tests;

use App\Controllers\Status\HealthCheck;
use PHPUnit\Framework\TestCase;
use Slim\Psr7\Response;

final class HealthCheckTest extends TestCase
{
    public function testInvoking()
    {
        $controller = new HealthCheck();
        $response = $controller(
            $this->createStub(\Slim\Psr7\Request::class),
            new Response()
        );

        $this->assertSame(200, $response->getStatusCode());
    }
}
