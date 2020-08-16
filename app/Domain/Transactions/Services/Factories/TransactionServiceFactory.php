<?php

namespace App\Domain\Transactions\Services\Factories;

use App\Domain\Transactions\Contracts\Repositories\TransactionRepositoryInterface;
use App\Domain\Transactions\Contracts\Services\TransferServiceInterface;
use App\Domain\Transactions\Services\TransactionService;

/**
 * Class TransactionServiceFactory
 * @package App\Domain\Transactions\Services\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionServiceFactory
{
    /**
     * @return \App\Domain\Transactions\Services\TransactionService
     */
    public function __invoke(): TransactionService
    {
        $transactionRepository = app(TransactionRepositoryInterface::class);
        $transferService = app(TransferServiceInterface::class);
        $validatorService = app(ValidatorServiceFactoryMethod::class);

        return new TransactionService($transactionRepository, $transferService, $validatorService);
    }
}
