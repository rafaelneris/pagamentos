<?php

namespace App\Domain\Transactions\Services;

use App\Application\Exceptions\TransactionErrorException;
use App\Domain\Transactions\Contracts\Repositories\TransactionRepositoryInterface;
use App\Domain\Transactions\Contracts\Services\TransactionServiceInterface;
use App\Domain\Transactions\Contracts\Services\TransferServiceInterface;
use App\Domain\Transactions\Contracts\Services\ValidatorFactoryMethodInterface;
use App\Domain\Transactions\Entities\TransactionEntity;
use Illuminate\Support\Facades\DB;

/**
 * Class TransactionService
 * @package App\Domain\Transactions\Services
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionService implements TransactionServiceInterface
{
    /** @var \App\Domain\Transactions\Contracts\Repositories\TransactionRepositoryInterface */
    private TransactionRepositoryInterface $transactionRepository;

    /** @var \App\Domain\Transactions\Contracts\Services\TransferServiceInterface */
    private TransferServiceInterface $transferService;
    /**
     * @var \App\Domain\Transactions\Contracts\Services\ValidatorFactoryMethodInterface
     */
    private ValidatorFactoryMethodInterface $validatorFactoryMethod;

    /**
     * TransactionService constructor.
     * @param \App\Domain\Transactions\Contracts\Repositories\TransactionRepositoryInterface $transactionRepository
     * @param \App\Domain\Transactions\Contracts\Services\TransferServiceInterface           $transferService
     * @param \App\Domain\Transactions\Contracts\Services\ValidatorFactoryMethodInterface $validatorFactoryMethod
     */
    public function __construct(
        TransactionRepositoryInterface $transactionRepository,
        TransferServiceInterface $transferService,
        ValidatorFactoryMethodInterface $validatorFactoryMethod
    ) {
        $this->transactionRepository = $transactionRepository;
        $this->transferService = $transferService;
        $this->validatorFactoryMethod = $validatorFactoryMethod;
    }

    /**
     * @param \App\Domain\Transactions\Entities\TransactionEntity $transactionEntity
     * @return \App\Domain\Transactions\Entities\TransactionEntity
     * @throws \App\Application\Exceptions\NoFundsException
     * @throws \App\Application\Exceptions\StoreTransferException
     * @throws \App\Application\Exceptions\TransactionErrorException
     * @throws \App\Application\Exceptions\UserNotFoundException
     */
    public function transfer(TransactionEntity $transactionEntity): TransactionEntity
    {
        $this->validateTransaction($transactionEntity);
        try {
            DB::beginTransaction();
            $transactionEntity = $this->transactionRepository->registerTransaction($transactionEntity);
            $this->transferService->transfer($transactionEntity);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new TransactionErrorException();
        }
        return $transactionEntity;
    }

    /**
     * @param \App\Domain\Transactions\Entities\TransactionEntity $transactionEntity
     * @throws \App\Application\Exceptions\NoFundsException
     * @throws \App\Application\Exceptions\StoreTransferException
     * @throws \App\Application\Exceptions\UserNotFoundException
     */
    private function validateTransaction(TransactionEntity $transactionEntity): void
    {
        $validatorService = $this->validatorFactoryMethod->factory($transactionEntity);
        $validatorService->validateActors();
        $validatorService->validatePayerEqualsPayee();
        $validatorService->validatePayer();
        $validatorService->validateBalance();
    }
}
