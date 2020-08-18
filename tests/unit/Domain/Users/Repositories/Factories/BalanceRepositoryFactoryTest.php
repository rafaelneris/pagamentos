<?php

namespace Tests\Domain\Users\Repositories\Factories;

use App\Contracts\Users\Repositories\BalanceRepositoryInterface;
use App\Repositories\Users\Factories\BalanceRepositoryFactory;
use Tests\TestCase;

/**
 * Class BalanceRepositoryFactoryTest
 * @package Tests\Domain\Users\Repositories\Factories
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
