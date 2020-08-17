<?php

namespace Tests\Domain\Transactions\Services\Factories;

use App\Domain\Transactions\Contracts\Services\AuthorizerServiceInterface;
use App\Domain\Transactions\Services\Factories\AuthorizerServiceFactory;
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
