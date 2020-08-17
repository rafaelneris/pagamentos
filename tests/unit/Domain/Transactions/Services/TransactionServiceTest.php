<?php

namespace Tests\Domain\Transactions\Services;

use App\Application\Exceptions\UserNotFoundException;
use App\Domain\Transactions\Contracts\Repositories\TransactionRepositoryInterface;
use App\Domain\Transactions\Contracts\Services\TransferServiceInterface;
use App\Domain\Transactions\Contracts\Services\ValidatorFactoryMethodInterface;
use App\Domain\Transactions\Contracts\Services\ValidatorServiceInterface;
use App\Domain\Transactions\Entities\TransactionEntity;
use App\Domain\Transactions\Services\TransactionService;
use Tests\TestCase;

/**
 * Class TransactionServiceTest
 * @package Tests\Domain\Transactions\Services
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionServiceTest extends TestCase
{
    private $transactionRepositoryMock;
    private $transferServiceMock;
    private $validatorMethodFactory;
    private $validatorService;

    public function setUp(): void
    {
        parent::setUp();
        $this->configureDependencies();
    }

    public function testTransfer()
    {
        $entity = $this->makeEntity();

        $mockObjects = $this->configureDependenciesToTransfer();
        $transactionService = new TransactionService(
            $mockObjects['transactionRepositoryMock'],
            $mockObjects['transferServiceMock'],
            $mockObjects['validatorMethodFactory']);
        $returnValue = $transactionService->transfer($entity);

        $this->assertEquals($entity, $returnValue);
    }

    public function testTransferWithError()
    {
        $entity = $this->makeEntity();
        $this->expectException(UserNotFoundException::class);

        $mockObjects = $this->configureDependenciesToTransferWithError();
        $transactionService = new TransactionService(
            $mockObjects['transactionRepositoryMock'],
            $mockObjects['transferServiceMock'],
            $mockObjects['validatorMethodFactory']);
        $returnValue = $transactionService->transfer($entity);

        $this->assertEquals($entity, $returnValue);
    }

    private function configureDependenciesToTransfer()
    {
        $entity = $this->makeEntity();
        $transactionRepositoryMock = clone $this->transactionRepositoryMock;
        $transferServiceMock = clone $this->transferServiceMock;
        $validatorServiceFactoryMock = clone $this->validatorMethodFactory;
        $validatorService = clone $this->validatorService;

        $transactionRepositoryMock->method('registerTransaction')->willReturn($entity);
        $transferServiceMock->method('transfer')->willReturnSelf();

        $validatorService->method('validateActors')->willReturnSelf();
        $validatorService->method('validatePayerEqualsPayee')->willReturnSelf();
        $validatorService->method('validatePayer')->willReturnSelf();
        $validatorService->method('validateBalance')->willReturnSelf();

        $validatorServiceFactoryMock->method('factory')->willReturn($validatorService);

        return [
            'transactionRepositoryMock' => $transactionRepositoryMock,
            'transferServiceMock' => $transferServiceMock,
            'validatorMethodFactory' => $validatorServiceFactoryMock,
            'validatorService' => $validatorService,
        ];
    }

    private function configureDependenciesToTransferWithError()
    {
        $entity = $this->makeEntity();

        $transactionRepositoryMock = clone $this->transactionRepositoryMock;
        $transferServiceMock = clone $this->transferServiceMock;
        $validatorServiceFactoryMock = clone $this->validatorMethodFactory;
        $validatorService = clone $this->validatorService;

        $transactionRepositoryMock->method('registerTransaction')->willReturn($entity);
        $transferServiceMock->method('transfer')->willReturnSelf();

        $validatorService->method('validateActors')->willThrowException(new UserNotFoundException);

        $validatorServiceFactoryMock->method('factory')->willReturn($validatorService);

        return [
            'transactionRepositoryMock' => $transactionRepositoryMock,
            'transferServiceMock' => $transferServiceMock,
            'validatorMethodFactory' => $validatorServiceFactoryMock,
            'validatorService' => $validatorService,
        ];
    }

    private function configureDependencies()
    {
        $this->transactionRepositoryMock = $this->createMock(TransactionRepositoryInterface::class);
        $this->transferServiceMock = $this->createMock(TransferServiceInterface::class);
        $this->validatorMethodFactory = $this->createMock(ValidatorFactoryMethodInterface::class);
        $this->validatorService = $this->createMock(ValidatorServiceInterface::class);
    }

    private function makeEntity()
    {
        $transactionEntity = new TransactionEntity();
        $transactionEntity
            ->setId('2f5f8fa1-f14f-4997-aa5c-8ddf6e5c9908')
            ->setPayer('6b1faf2e-fbb1-4af1-ab70-9471c2a0f046')
            ->setPayee('04efa1b0-c76d-436d-a459-363af805bb49')
            ->setValue(200.98);
        return $transactionEntity;
    }
}
