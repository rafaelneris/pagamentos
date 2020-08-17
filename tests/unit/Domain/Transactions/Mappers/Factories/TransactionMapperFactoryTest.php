<?php

namespace Tests\Unit\Domain\Transactions\Mappers\Factories;

use App\Domain\Transactions\Contracts\Mappers\TransactionMapperInterface;
use App\Domain\Transactions\Mappers\Factories\TransactionMapperFactory;
use Tests\TestCase;

/**
 * Class TransactionMapperFactory
 * @package Tests\unit\Domain\Transactions\Mappers\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionMapperFactoryTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testFactory()
    {
        $transactionMapper = (new TransactionMapperFactory())();
        $this->assertInstanceOf(TransactionMapperInterface::class, $transactionMapper);
    }
}
