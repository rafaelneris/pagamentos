<?php

namespace App\Services\Transactions\Factories;

use App\Contracts\Transactions\Repositories\TransactionRepositoryInterface;
use App\Contracts\Transactions\Services\TransferServiceInterface;
use App\Services\Transactions\TransactionService;

/**
 * Class TransactionServiceFactory
 * @package App\Services\Transactions\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionServiceFactory
{
    /**
     * @return \App\Services\Transactions\TransactionService
     */
    public function __invoke(): TransactionService
    {
        $transactionRepository = app(TransactionRepositoryInterface::class);
        $transferService = app(TransferServiceInterface::class);
        $validatorService = app(ValidatorServiceFactoryMethod::class);

        return new TransactionService($transactionRepository, $transferService, $validatorService);
    }
}
