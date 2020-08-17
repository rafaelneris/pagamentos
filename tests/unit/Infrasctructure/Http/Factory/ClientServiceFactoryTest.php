<?php

namespace Tests\Infrastructure\Http\Factory;

use App\Infrastructure\Contracts\Http\ClientServiceInterface;
use App\Infrastructure\Http\Factories\ClientServiceFactory;
use Tests\TestCase;

/**
 * Class ClientServiceFactoryTest
 * @package Tests\Interfaces\Factory
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class ClientServiceFactoryTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    public function testFactory()
    {
        $clientService = (new ClientServiceFactory())();
        $this->assertInstanceOf(ClientServiceInterface::class, $clientService);
    }
}
