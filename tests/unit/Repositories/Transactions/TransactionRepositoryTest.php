<?php

namespace Tests\Repositories\Transactions;

use App\Contracts\Transactions\Mappers\TransactionMapperInterface;
use App\Entities\Transactions\TransactionEntity;
use App\Repositories\Transactions\TransactionRepository;
use App\Model\Transactions;
use Illuminate\Database\Query\Builder;
use Ramsey\Uuid\Uuid;

/**
 * Class TransactionRepositoryTest
 * @package Tests\Repositories\Transactions
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Ramsey\Uuid\Uuid */
    private $uuIdProphesize;

    private $transactionMapperProphesize;

    private $queryBuilder;

    private $model;

    private $transactionEntity;

    public function setUp(): void
    {
        parent::setUp();
        $this->setUpDependencies();

    }

    /**
     * @dataProvider provideEntity
     */
    public function testRegisterTransaction($transactionData, $transactionEntity)
    {
        $this->uuIdProphesize->uuId4()->willReturn('2f5f8fa1-f14f-4997-aa5c-8ddf6e5c9908');

        $this->transactionEntity->method('setId')->willReturn($transactionEntity);

        $this->transactionMapperProphesize->revert($transactionEntity)->willReturn($transactionData);
        $this->queryBuilder->method('insert')->willReturn($this->model->reveal());

        $concreteClass = new TransactionRepository(
            $this->model->reveal(),
            $this->transactionMapperProphesize->reveal()
        );

        $registerReturn = $concreteClass->registerTransaction($transactionEntity);
        $this->assertEquals($transactionEntity, $registerReturn);
    }

    private function setUpDependencies()
    {
        $this->uuIdProphesize = $this->prophesize(Uuid::class);
        $this->transactionMapperProphesize = $this->prophesize(TransactionMapperInterface::class);
        $this->queryBuilder = $this->createMock(Builder::class);
        $this->model = $this->prophesize(Transactions::class);
        $this->transactionEntity = $this->createMock(TransactionEntity::class);
        $this->model->newQuery()->willReturn($this->queryBuilder);
    }

    public function provideEntity()
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
