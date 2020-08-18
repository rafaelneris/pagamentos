<?php

namespace Tests\Domain\Transactions\Services\Factories;

use App\Contracts\Transactions\Services\TransactionServiceInterface;
use App\Services\Transactions\Factories\TransactionServiceFactory;
use Tests\TestCase;

/**
 * Class TransactionServiceFactoryTest
 * @package Tests\Domain\Transactions\Services\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionServiceFactoryTest extends TestCase
{

    public function testFactory()
    {
        $transactionService = (new TransactionServiceFactory())();
        $this->assertInstanceOf(TransactionServiceInterface::class, $transactionService);
    }
}
