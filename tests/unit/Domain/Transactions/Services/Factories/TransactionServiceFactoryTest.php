<?php

namespace Tests\Domain\Transactions\Services\Factories;

use App\Domain\Transactions\Contracts\Services\TransactionServiceInterface;
use App\Domain\Transactions\Services\Factories\TransactionServiceFactory;
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
