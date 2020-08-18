<?php

namespace App\Services\Transactions;

use App\Exceptions\TransactionErrorException;
use App\Contracts\Transactions\Repositories\TransactionRepositoryInterface;
use App\Contracts\Transactions\Services\TransactionServiceInterface;
use App\Contracts\Transactions\Services\TransferServiceInterface;
use App\Contracts\Transactions\Services\ValidatorFactoryMethodInterface;
use App\Entities\Transactions\TransactionEntity;
use Illuminate\Support\Facades\DB;

/**
 * Class TransactionService
 * @package App\Services\Transactions
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionService implements TransactionServiceInterface
{
    /** @var \App\Contracts\Transactions\Repositories\TransactionRepositoryInterface */
    private TransactionRepositoryInterface $transactionRepository;

    /** @var \App\Contracts\Transactions\Services\TransferServiceInterface */
    private TransferServiceInterface $transferService;
    /**
     * @var \App\Contracts\Transactions\Services\ValidatorFactoryMethodInterface
     */
    private ValidatorFactoryMethodInterface $validatorFactoryMethod;

    /**
     * TransactionService constructor.
     * @param \App\Contracts\Transactions\Repositories\TransactionRepositoryInterface $transactionRepository
     * @param \App\Contracts\Transactions\Services\TransferServiceInterface           $transferService
     * @param \App\Contracts\Transactions\Services\ValidatorFactoryMethodInterface $validatorFactoryMethod
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
     * @param \App\Entities\Transactions\TransactionEntity $transactionEntity
     * @return \App\Entities\Transactions\TransactionEntity
     * @throws \App\Exceptions\NoFundsException
     * @throws \App\Exceptions\StoreTransferException
     * @throws \App\Exceptions\TransactionErrorException
     * @throws \App\Exceptions\UserNotFoundException
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
     * @param \App\Entities\Transactions\TransactionEntity $transactionEntity
     * @throws \App\Exceptions\NoFundsException
     * @throws \App\Exceptions\StoreTransferException
     * @throws \App\Exceptions\UserNotFoundException
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
