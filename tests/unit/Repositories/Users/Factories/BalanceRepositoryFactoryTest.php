<?php

namespace Tests\Repositories\Users\Factories;

use App\Contracts\Users\Repositories\BalanceRepositoryInterface;
use App\Repositories\Users\Factories\BalanceRepositoryFactory;
use Tests\TestCase;

/**
 * Class BalanceRepositoryFactoryTest
 * @package Tests\Repositories\Users\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class BalanceRepositoryFactoryTest extends TestCase
{

    public function testInvoke()
    {
        $balanceRepository = (new BalanceRepositoryFactory())();
        $this->assertInstanceOf(BalanceRepositoryInterface::class, $balanceRepository);
    }
}
