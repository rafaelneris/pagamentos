<?php

namespace Tests\Domain\Transactions\Services\Factories;

use App\Contracts\Transactions\Services\AuthorizerServiceInterface;
use App\Services\Transactions\Factories\AuthorizerServiceFactory;
use Tests\TestCase;

/**
 * Class AuthorizerServiceFactoryTest
 * @package Tests\Domain\Transactions\Services\Factories@@
 * @author Rafael Neris
 */
class AuthorizerServiceFactoryTest extends TestCase
{
    public function testFactory()
    {
        $authorizerService = (new AuthorizerServiceFactory())();
        $this->assertInstanceOf(AuthorizerServiceInterface::class, $authorizerService);
    }
}
