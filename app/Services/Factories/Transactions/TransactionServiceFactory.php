<?php

namespace App\Services\Factories\Transactions;

use App\Repositories\Contracts\Transactions\TransactionRepositoryInterface;
use App\Services\Contracts\Transactions\TransferServiceInterface;
use App\Services\Contracts\Users\BalanceServiceInterface;
use App\Services\Contracts\Users\UserServiceInterface;
use App\Services\Transactions\TransactionService;

/**
 * Class TransactionServiceFactory
 * @package App\Services\Factories\Transactions
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionServiceFactory
{
    /**
     * @return \App\Services\Transactions\TransactionService
     */
    public function __invoke()
    {
        $transactionRepository = app(TransactionRepositoryInterface::class);
        $userService = app(UserServiceInterface::class);
        $balanceService = app(BalanceServiceInterface::class);
        $transferService = app(TransferServiceInterface::class);

        return new TransactionService($transactionRepository, $userService, $balanceService, $transferService);
    }
}
