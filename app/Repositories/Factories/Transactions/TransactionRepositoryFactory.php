<?php

namespace App\Repositories\Factories\Transactions;

use App\Models\Transactions;
use App\Repositories\Eloquent\Transactions\TransactionRepository;

/**
 * Class TransactionServiceFactory
 * @package App\Repositories\Factories\Transactions
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionRepositoryFactory
{
    /**
     * @return \App\Repositories\Eloquent\Transactions\TransactionRepository
     */
    public function __invoke()
    {
        $transactionModel = app(Transactions::class);
        return new TransactionRepository($transactionModel);
    }
}
