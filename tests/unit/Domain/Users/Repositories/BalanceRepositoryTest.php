<?php

namespace Tests\Domain\Users\Repositories;

use App\Contracts\Users\Mappers\BalanceMapperInterface;
use App\Entities\Users\BalanceEntity;
use App\Repositories\Users\BalanceRepository;
use App\Model\UsersBalance;
use Illuminate\Database\Query\Builder;
use Tests\TestCase;

class BalanceRepositoryTest extends TestCase
{
    private $userBalanceModel;

    private $balanceMapper;

    private $queryBuilder;

    private $balanceEntity;

    private $eloquentQueryBuilder;

    public function setUp(): void
    {
        parent::setUp();
        $this->setUpDependencies();
    }

    public function testGetByUserId()
    {
        $this->configureMock();

        $balanceRepository = new BalanceRepository($this->userBalanceModel, $this->balanceMapper);
        $balanceEntity = $balanceRepository->getByUserId('0abcdd94-5cfe-49f2-b64a-16e4e90eb585');
        $this->assertInstanceOf(BalanceEntity::class, $balanceEntity);
    }

    public function testGetInexistsUserId()
    {
        $this->eloquentQueryBuilder
            ->method('find')
            ->willReturn(null);
        $balanceRepository = new BalanceRepository($this->userBalanceModel, $this->balanceMapper);
        $balanceEntity = $balanceRepository->getByUserId('2000');
        $this->assertNull($balanceEntity);
    }

    public function testUpdateValue()
    {
        $this->configureMock();
        $balanceRepository = new BalanceRepository($this->userBalanceModel, $this->balanceMapper);
        $retorno = $balanceRepository->updateValue($this->makeBalanceEntity());
        $this->assertEquals($retorno, $this->makeBalanceEntity());
    }

    private function configureMock()
    {
        $this->configureMockModel();
        $this->configureMockBalanceEntity();
        $this->configureMockMapper();
    }

    private function configureMockBalanceEntity()
    {
        $this->balanceEntity->method('getUserId')->willReturn('0abcdd94-5cfe-49f2-b64a-16e4e90eb585');
        $this->balanceEntity->method('getBalance')->willReturn(250.93);
        $this->balanceEntity->method('setUserId')->willReturn($this->balanceEntity);
    }

    private function configureMockModel()
    {
        $balanceArray = [
            'userId' => '0abcdd94-5cfe-49f2-b64a-16e4e90eb585',
            'balance' => 250.93
        ];

        $this->userBalanceModel->method('toArray')->willReturn($balanceArray);
        $this->eloquentQueryBuilder->method('updateOrCreate')->willReturn($this->userBalanceModel);
        $this->eloquentQueryBuilder
            ->method('find')
            ->willReturn($this->userBalanceModel);
    }

    private function configureMockMapper()
    {
        $balanceEntity = $this->makeBalanceEntity();
        $this->balanceMapper->method('map')->willReturn($balanceEntity);
    }

    private function setUpDependencies()
    {
        $this->userBalanceModel = $this->createMock(UsersBalance::class);
        $this->balanceMapper = $this->createMock(BalanceMapperInterface::class);
        $this->queryBuilder = $this->createMock(Builder::class);
        $this->eloquentQueryBuilder = $this->createMock(\Illuminate\Database\Eloquent\Builder::class);
        $this->userBalanceModel->method('newQuery')->willReturn($this->eloquentQueryBuilder);

        $this->balanceEntity = $this->createMock(BalanceEntity::class);
    }

    private function makeBalanceEntity()
    {
        $balanceEntity = new BalanceEntity();
        $balanceEntity
            ->setUserId('0abcdd94-5cfe-49f2-b64a-16e4e90eb585')
            ->setBalance(250.93);
        return $balanceEntity;
    }
}
