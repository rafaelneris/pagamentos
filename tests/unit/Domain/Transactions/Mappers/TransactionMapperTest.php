<?php

namespace Tests\Unit\Domain\Transactions\Mappers;

use App\Contracts\Transactions\Mappers\TransactionMapperInterface;
use App\Entities\Transactions\TransactionEntity;
use Tests\TestCase;

/**
 * Class TransactionMapperTest
 * @package Tests\unit\Domain\Transactions\Mappers
 * @author Rafael Neirs <rafaelnerisdj@gmail.com>
 */
class TransactionMapperTest extends TestCase
{
    private $mapper;

    public function setUp(): void
    {
        parent::setUp();
        $this->mapper = app(TransactionMapperInterface::class);
    }

    public function testInstance()
    {
        $this->assertInstanceOf(TransactionMapperInterface::class, $this->mapper);
    }

    /**
     * @dataProvider provideDataMap
     */
    public function testMapTransactionEntity($transactionData)
    {
        $mappedEntity = $this->mapper->map($transactionData);
        $this->assertInstanceOf(TransactionEntity::class, $mappedEntity);
    }

    /**
     * @dataProvider provideDataMap
     */
    public function testMapReturn($transactionData, $expectedEntity)
    {
        $mappedEntity = $this->mapper->map($transactionData);
        $this->assertEquals($expectedEntity, $mappedEntity);
    }

    /**
     * @dataProvider provideDataMap
     */
    public function testRevertReturn($expectedData, $transactionEntity)
    {
        $mappedArray = $this->mapper->revert($transactionEntity);
        $this->assertEquals($mappedArray, $expectedData);
    }

    public function provideDataMap()
    {
        $transactionEntity = new TransactionEntity();
        $transactionEntity
            ->setId('2f5f8fa1-f14f-4997-aa5c-8ddf6e5c9908')
            ->setPayer('6b1faf2e-fbb1-4af1-ab70-9471c2a0f046')
            ->setPayee('04efa1b0-c76d-436d-a459-363af805bb49')
            ->setValue(200.98);

        return [
            [
                [
                    'id' => '2f5f8fa1-f14f-4997-aa5c-8ddf6e5c9908',
                    'payer' => '6b1faf2e-fbb1-4af1-ab70-9471c2a0f046',
                    'payee' => '04efa1b0-c76d-436d-a459-363af805bb49',
                    'value' => 200.98
                ],
                $transactionEntity

            ]
        ];
    }
}
