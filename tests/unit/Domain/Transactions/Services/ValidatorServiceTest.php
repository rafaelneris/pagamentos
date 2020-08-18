<?php

namespace Tests\Domain\Transactions\Services;

use App\Exceptions\NoFundsException;
use App\Exceptions\PayerEqualsPayeeException;
use App\Exceptions\StoreTransferException;
use App\Contracts\Transactions\Services\TransactionServiceInterface;
use App\Entities\Transactions\TransactionEntity;
use App\Services\Transactions\ValidatorService;
use App\Contracts\Users\Services\BalanceServiceInterface;
use App\Contracts\Users\Services\UserServiceInterface;
use Tests\TestCase;

class ValidatorServiceTest extends TestCase
{

    private $userService;
    private $balanceService;
    private $transactionEntity;

    public function setUp(): void
    {
        parent::setUp();
        $this->configureDependencies();
    }

    public function testValidatePayer()
    {
        $transactionEntity = clone $this->transactionEntity;
        $userService = clone $this->userService;
        $balanceService = clone $this->balanceService;

        $transactionEntity
            ->method('getPayer')
            ->willReturn('6b1faf2e-fbb1-4af1-ab70-9471c2a0f046');
        $userService->method('isUserType')->willReturn(true);

        $validatorService = new ValidatorService($userService, $balanceService, $transactionEntity);
        $retorno = $validatorService->validatePayer();
        $this->assertNull($retorno);
    }

    public function testValidatePayerWithError()
    {
        $this->expectException(StoreTransferException::class);
        $transactionEntity = clone $this->transactionEntity;
        $userService = clone $this->userService;
        $balanceService = clone $this->balanceService;

        $transactionEntity
            ->method('getPayer')
            ->willReturn('6b1faf2e-fbb1-4af1-ab70-9471c2a0f046');
        $userService->method('isUserType')->willReturn(false);

        $validatorService = new ValidatorService($userService, $balanceService, $transactionEntity);
        $retorno = $validatorService->validatePayer();
        $this->assertNull($retorno);
    }

    public function testValidateActors()
    {
        $transactionEntity = clone $this->transactionEntity;
        $userService = clone $this->userService;
        $balanceService = clone $this->balanceService;

        $transactionEntity
            ->method('getPayer')
            ->willReturn('6b1faf2e-fbb1-4af1-ab70-9471c2a0f046');
        $transactionEntity
            ->method('getPayee')
            ->willReturn('04efa1b0-c76d-436d-a459-363af805bb49');
        $userService->method('existsUser')->willReturnSelf();

        $validatorService = new ValidatorService($userService, $balanceService, $transactionEntity);
        $retorno = $validatorService->validateActors();
        $this->assertNull($retorno);
    }

    public function testValidatePayerEqualsPayee()
    {
        $transactionEntity = clone $this->transactionEntity;
        $userService = clone $this->userService;
        $balanceService = clone $this->balanceService;

        $transactionEntity
            ->method('getPayer')
            ->willReturn('6b1faf2e-fbb1-4af1-ab70-9471c2a0f046');
        $transactionEntity
            ->method('getPayee')
            ->willReturn('04efa1b0-c76d-436d-a459-363af805bb49');
        $validatorService = new ValidatorService($userService, $balanceService, $transactionEntity);
        $retorno = $validatorService->validatePayerEqualsPayee();
        $this->assertNull($retorno);
    }

    public function testValidatePayerEqualsPayeeError()
    {
        $this->expectException(PayerEqualsPayeeException::class);
        $transactionEntity = clone $this->transactionEntity;
        $userService = clone $this->userService;
        $balanceService = clone $this->balanceService;

        $transactionEntity
            ->method('getPayer')
            ->willReturn('6b1faf2e-fbb1-4af1-ab70-9471c2a0f046');
        $transactionEntity
            ->method('getPayee')
            ->willReturn('6b1faf2e-fbb1-4af1-ab70-9471c2a0f046');

        $validatorService = new ValidatorService($userService, $balanceService, $transactionEntity);
        $validatorService->validatePayerEqualsPayee();
    }

    public function testValidateBalance()
    {
        $transactionEntity = clone $this->transactionEntity;
        $userService = clone $this->userService;
        $balanceService = clone $this->balanceService;

        $transactionEntity
            ->method('getPayer')
            ->willReturn('6b1faf2e-fbb1-4af1-ab70-9471c2a0f046');
        $transactionEntity
            ->method('getValue')
            ->willReturn(293.93);
        $balanceService->method('allowsTransfer')->willReturn(true);

        $validatorService = new ValidatorService($userService, $balanceService, $transactionEntity);
        $retorno = $validatorService->validateBalance();
        $this->assertNull($retorno);
    }

    public function testValidateBalanceError()
    {
        $this->expectException(NoFundsException::class);
        $transactionEntity = clone $this->transactionEntity;
        $userService = clone $this->userService;
        $balanceService = clone $this->balanceService;

        $transactionEntity
            ->method('getPayer')
            ->willReturn('6b1faf2e-fbb1-4af1-ab70-9471c2a0f046');
        $transactionEntity
            ->method('getValue')
            ->willReturn(293.93);
        $balanceService->method('allowsTransfer')->willReturn(false);

        $validatorService = new ValidatorService($userService, $balanceService, $transactionEntity);
        $validatorService->validateBalance();
    }

    private function configureDependencies()
    {
        $this->balanceService = $this->createMock(BalanceServiceInterface::class);
        $this->userService = $this->createMock(UserServiceInterface::class);
        $this->transactionEntity = $this->createMock(TransactionEntity::class);
    }
}
