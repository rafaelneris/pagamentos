<?php

namespace Tests\Repositories\Transactions\Factories;

use App\Contracts\Transactions\Repositories\TransactionRepositoryInterface;
use App\Repositories\Transactions\Factories\TransactionRepositoryFactory;
use Tests\TestCase;

/**
 * Class TransactionRepositoryFactoryTest
 * @package Tests\Repositories\Transactions\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionRepositoryFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $transactionRepository = (new TransactionRepositoryFactory())();
        $this->assertInstanceOf(TransactionRepositoryInterface::class, $transactionRepository);
    }
}
