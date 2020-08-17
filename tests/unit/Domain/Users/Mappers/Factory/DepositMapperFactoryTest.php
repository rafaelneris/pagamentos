<?php

namespace Tests\Domain\Users\Mappers\Factory;

use App\Domain\Users\Contracts\Mappers\DepositMapperInterface;
use App\Domain\Users\Mappers\Factories\DepositMapperFactory;
use Tests\TestCase;

/**
 * Class DepositMapperFactoryTest
 * @package Tests\Domain\Users\Mappers\Factory
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class DepositMapperFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $depositMapper = (new DepositMapperFactory())();
        $this->assertInstanceOf(DepositMapperInterface::class, $depositMapper);
    }
}
