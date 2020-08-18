<?php

namespace Tests\Services\Users;

use App\Contracts\Users\Mappers\BalanceMapperInterface;
use App\Contracts\Users\Repositories\BalanceRepositoryInterface;
use App\Contracts\Users\Services\UserServiceInterface;
use App\Entities\Users\BalanceEntity;
use App\Entities\Users\DepositEntity;
use App\Services\Users\BalanceService;
use Tests\TestCase;

class BalanceServiceTest extends TestCase
{

    private $balanceRepository;
    private $userService;
    private $balanceMapper;

    public function setUp(): void
    {
        parent::setUp();
        $this->configureDependencies();
    }

    public function testDisallowsTransfer()
    {
        $balanceMapper = clone $this->balanceMapper;
        $userService = clone $this->userService;
        $balanceRepository = clone $this->balanceRepository;

        $balanceEntity = $this->createMock(BalanceEntity::class);
        $balanceEntity->method('getBalance')->willReturn(230.93);


        $balanceRepository->method('getByUserId')->willReturn($balanceEntity);

        $balanceService = new BalanceService($balanceRepository, $userService, $balanceMapper);
        $retorno = $balanceService->allowsTransfer(
            '0abcdd94-5cfe-49f2-b64a-16e4e90eb585',
            300
        );

        $this->assertFalse($retorno);
    }

    public function testAllowsTransfer()
    {
        $balanceMapper = clone $this->balanceMapper;
        $userService = clone $this->userService;
        $balanceRepository = clone $this->balanceRepository;

        $balanceEntity = $this->createMock(BalanceEntity::class);
        $balanceEntity->method('getBalance')->willReturn(400.09);


        $balanceRepository->method('getByUserId')->willReturn($balanceEntity);

        $balanceService = new BalanceService($balanceRepository, $userService, $balanceMapper);
        $retorno = $balanceService->allowsTransfer(
            '0abcdd94-5cfe-49f2-b64a-16e4e90eb585',
            300.50
        );

        $this->assertTrue($retorno);
    }

    public function testGetBalanceValue()
    {
        $balanceMapper = clone $this->balanceMapper;
        $userService = clone $this->userService;
        $balanceRepository = clone $this->balanceRepository;

        $balanceEntity = $this->createMock(BalanceEntity::class);
        $balanceEntity->method('getBalance')->willReturn(230.93);


        $balanceRepository->method('getByUserId')->willReturn($balanceEntity);

        $balanceService = new BalanceService($balanceRepository, $userService, $balanceMapper);
        $retorno = $balanceService->getBalanceValue('0abcdd94-5cfe-49f2-b64a-16e4e90eb585');

        $this->assertEquals(230.93, $retorno);
    }

    public function testGetBalanceValueWithBalanceZero()
    {
        $balanceMapper = clone $this->balanceMapper;
        $userService = clone $this->userService;
        $balanceRepository = clone $this->balanceRepository;

        $balanceRepository->method('getByUserId')->willReturn(null);

        $balanceService = new BalanceService($balanceRepository, $userService, $balanceMapper);
        $retorno = $balanceService->getBalanceValue('0abcdd94-5cfe-49f2-b64a-16e4e90eb585');

        $this->assertEquals(0, $retorno);
    }

    public function testWithDraw()
    {
        $balanceMapper = clone $this->balanceMapper;
        $userService = clone $this->userService;
        $balanceRepository = clone $this->balanceRepository;
        $balanceEntity = $this->makeBalanceEntity();
        $balanceEntity = $this->createMock(BalanceEntity::class);
        $balanceEntity->method('getBalance')->willReturn(230.93);

        $balanceMapper->method('map')->willReturn($balanceEntity);

        $balanceRepository->method('updateValue')->willReturn($balanceEntity);
        $balanceService = new BalanceService($balanceRepository, $userService, $balanceMapper);
        $retorno = $balanceService->withDraw('0abcdd94-5cfe-49f2-b64a-16e4e90eb585', 100);

        $this->assertInstanceOf(BalanceEntity::class, $retorno);

    }

    public function testDeposit()
    {
        $balanceMapper = clone $this->balanceMapper;
        $userService = clone $this->userService;
        $balanceRepository = clone $this->balanceRepository;

        $balanceEntity = $this->createMock(BalanceEntity::class);
        $balanceEntity->method('getBalance')->willReturn(230.93);

        $depositEntity = $this->createMock(DepositEntity::class);
        $depositEntity->method('getUserId')->willReturn('0abcdd94-5cfe-49f2-b64a-16e4e90eb585');
        $depositEntity->method('getValue')->willReturn(230.93);
        $userService->method('existsUser')->willReturnSelf();
        $arrayRevert =  [
            'userId' => '0abcdd94-5cfe-49f2-b64a-16e4e90eb585',
            'balance' => 250.93
        ];
        $balanceMapper->method('map')->willReturn($balanceEntity);
        $balanceMapper->method('revert')->willReturn(
            $arrayRevert
        );

        $balanceRepository->method('getByUserId')->willReturn($balanceEntity);
        $balanceRepository->method('updateValue')->willReturn($balanceEntity);

        $balanceService = new BalanceService($balanceRepository, $userService, $balanceMapper);
        $retorno = $balanceService->deposit($depositEntity);
        $this->assertEquals($arrayRevert, $retorno);
    }

    public function configureDependencies()
    {
        $this->balanceRepository = $this->createMock(BalanceRepositoryInterface::class);
        $this->userService = $this->createMock(UserServiceInterface::class);
        $this->balanceMapper = $this->createMock(BalanceMapperInterface::class);
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
