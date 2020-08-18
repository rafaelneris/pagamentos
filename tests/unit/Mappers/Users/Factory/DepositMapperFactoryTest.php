<?php

namespace Tests\Mappers\Users\Factory;

use App\Contracts\Users\Mappers\DepositMapperInterface;
use App\Mappers\Users\Factories\DepositMapperFactory;
use Tests\TestCase;

/**
 * Class DepositMapperFactoryTest
 * @package Tests\Mappers\Users\Factory
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
