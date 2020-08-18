<?php

namespace Tests\Mappers\Users\Factory;

use App\Contracts\Users\Mappers\BalanceMapperInterface;
use App\Mappers\Users\Factories\BalanceMapperFactory;

/**
 * Class BalanceMapperFactoryTest
 * @package Tests\Mappers\Users\Factory
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class BalanceMapperFactoryTest extends \PHPUnit_Framework_TestCase
{

    public function testInvoke()
    {
        $balanceMapper = (new BalanceMapperFactory())();
        $this->assertInstanceOf(BalanceMapperInterface::class, $balanceMapper);
    }
}
