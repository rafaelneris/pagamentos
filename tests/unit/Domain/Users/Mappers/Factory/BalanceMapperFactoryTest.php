<?php

namespace Tests\Domain\Users\Mappers\Factory;

use App\Domain\Users\Contracts\Mappers\BalanceMapperInterface;
use App\Domain\Users\Mappers\Factories\BalanceMapperFactory;

/**
 * Class BalanceMapperFactoryTest
 * @package Tests\Domain\Users\Mappers\Factory
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
